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

create table consolidado_early2
(
	cod_registro nvarchar(255),
	fecha_reg	 date,
	tipo_ope	 nvarchar(255),
	region	 nvarchar(255),
	early		 nvarchar(255),
	valor_early	 nvarchar(255),
	destinatario nvarchar(255),
	linea_dest	 nvarchar(255)
)
go

-- TABLA 1

insert into consolidado_early values 
('E001',23,0.34,45,0.32,12,0.12,'Dennis Ramos','942445632'),
('E001',23,0.34,45,0.32,12,0.12,'Gianmarco Palacios','968677514'),
('E001',23,0.34,45,0.32,12,0.12,'Jorge Meza','970515051')
go

insert into consolidado_early values 
('E002',23,0.34,45,0.32,12,0.12,'julio Amoretti Almeyda','933946745'),
('E002',23,0.34,45,0.32,12,0.12,'Julio Amoretti Mendoza','996302255')
go

-- TABLA 2

select * from consolidado_early2
go

delete from consolidado_early2
go

insert into consolidado_early2 values
('E000',getdate(),'ALTA','GENERAL','E30','13.4','Dennis','942454632'),
('E000',getdate(),'PORTA','GENERAL','E30','12.4','JORGE','942454632'),
('E000',getdate(),'RENO','GENERAL','E30','10.6','GIANMARCO','942454632'),
('E000',getdate(),'ALTA','GENERAL','E60','8.6','Dennis','942454632'),
('E000',getdate(),'PORTA','GENERAL','E60','7.3','JORGE','942454632'),
('E000',getdate(),'RENO','GENERAL','E60','5.4','GIANMARCO','942454632'),
('E000',getdate(),'ALTA','GENERAL','E90','9.3','Dennis','942454632'),
('E000',getdate(),'PORTA','GENERAL','E90','2.3','JORGE','942454632'),
('E000',getdate(),'RENO','GENERAL','E90','6.5','GIANMARCO','942454632')
go


