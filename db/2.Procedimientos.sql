use master 
go

use enviosms
go


-- PROCEDIMIENTO PARA OBTENER DATOS DE consolidado_early

create procedure spu_getdatos_	
	@i_cod_registro		nvarchar(255)
as
	select alta,early_alta,porta,early_porta,reno,early_reno,destinatario,linea_dest from consolidado_early where cod_registro = @i_cod_registro;
go

exec spu_getdatos_consolidado_early 'E001'
go