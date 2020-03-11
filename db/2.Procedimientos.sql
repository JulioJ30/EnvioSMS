use master 
go

use enviosms
go


-- PROCEDIMIENTO PARA OBTENER DATOS DE consolidado_early

create procedure spu_getdatos_consolidado_early	
	@i_cod_registro		nvarchar(255)
as
	select alta,early_alta,porta,early_porta,reno,early_reno,destinatario,linea_dest from consolidado_early where cod_registro = @i_cod_registro;
go

exec spu_getdatos_consolidado_early 'E002'
go

-- PROCEDIMIENTO 2

alter procedure spu_getdatos_consolidado_early2	
	@i_region		nvarchar(255)
as
	select 
		t1.destinatario,
		t1.fecha_reg,
		@i_region region,
		STUFF((SELECT distinct ',' + t2.early FROM consolidado_early2 t2 where t2.destinatario = t1.destinatario  FOR XML PATH('')), 1, 1, '') early/*,
		STUFF((SELECT distinct ', ' + t2.tipo_ope FROM consolidado_early2 t2 where t2.destinatario = t1.destinatario  FOR XML PATH('')), 1, 1, '')operacion,
		STUFF((SELECT distinct ', ' + t2.valor_early FROM consolidado_early2 t2 where t2.destinatario = t1.destinatario  FOR XML PATH('')), 1, 1, '')valor_early*/
	from consolidado_early2 t1 where t1.region = @i_region
	group by t1.destinatario,	t1.fecha_reg
go

-- PROCEDIMIENTO 3
create procedure spu_getdatosop_consolidado_early2	
	@i_early			nvarchar(255),
	@i_destinatario		nvarchar(255)
as
	select CONCAT(tipo_ope,':	', valor_early)valor  from consolidado_early2 where early = @i_early and 
	destinatario = @i_destinatario order by tipo_ope
go

exec spu_getdatos_consolidado_early2 'GENERAL'
go

exec spu_getdatosop_consolidado_early2 'E30','JULIO'
go

select CONCAT(tipo_ope,':	', valor_early)valor  from consolidado_early2 where early = 'E30' and destinatario = 'DENNIS' order by tipo_ope
go

select * from consolidado_early2 
go