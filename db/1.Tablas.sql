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
-- DENNIS
('E000',getdate(),'ALTA','GENERAL','E30','10','DENNIS','942445632'),
('E000',getdate(),'PORTA','GENERAL','E30','11','DENNIS','942445632'),
('E000',getdate(),'RENO','GENERAL','E30','12','DENNIS','942445632'),

('E000',getdate(),'ALTA','GENERAL','E60','13','DENNIS','942445632'),
('E000',getdate(),'PORTA','GENERAL','E60','14','DENNIS','942445632'),

('E000',getdate(),'ALTA','GENERAL','E90','15','DENNIS','942445632'),

-- JULIO 
('E000',getdate(),'ALTA','GENERAL','E30','16','JULIO','933946745'),
('E000',getdate(),'PORTA','GENERAL','E30','17','JULIO','933946745'),
('E000',getdate(),'RENO','GENERAL','E30','18','JULIO','933946745'),

('E000',getdate(),'RENO','GENERAL','E60','19','JULIO','933946745'),
('E000',getdate(),'PORTA','GENERAL','E60','20','JULIO','933946745'),

('E000',getdate(),'PORTA','GENERAL','E90','21','JULIO','933946745')

go

