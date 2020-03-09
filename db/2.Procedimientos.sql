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
		STUFF((SELECT distinct ', ' + t2.early FROM consolidado_early2 t2 where t2.destinatario = t1.destinatario  FOR XML PATH('')), 1, 1, '') early,
		STUFF((SELECT distinct ', ' + t2.tipo_ope FROM consolidado_early2 t2 where t2.destinatario = t1.destinatario  FOR XML PATH('')), 1, 1, '')operacion,
		STUFF((SELECT distinct ', ' + t2.valor_early FROM consolidado_early2 t2 where t2.destinatario = t1.destinatario  FOR XML PATH('')), 1, 1, '')valor_early
	from consolidado_early2 t1 where t1.region = @i_region
	group by t1.destinatario,	t1.fecha_reg
go

exec spu_getdatos_consolidado_early2 'GENERAL'
go

