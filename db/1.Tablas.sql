use master 
go


create database enviosms
go

use enviosms
go

create table consolidado_early
(
	cod_registro nvarchar(255),
	alta float,
	early_alta float,
	porta float,
	early_porta float,
	reno float,
	early_reno float,
	destinatario nvarchar(255),
	linea_dest nvarchar(255)
)
go

insert into consolidado_early values 
('E001',23,0.34,45,0.32,12,0.12,'Dennis Ramos','942445632'),
('E001',23,0.34,45,0.32,12,0.12,'Gianmarco Palacios','968677514'),
('E001',23,0.34,45,0.32,12,0.12,'Jorge Meza','970515051')
go

insert into consolidado_early values 
('E002',23,0.34,45,0.32,12,0.12,'julio Amoretti Almeyda','933946745'),
('E002',23,0.34,45,0.32,12,0.12,'Julio Amoretti Mendoza','996302255')
go

select * from consolidado_early
go