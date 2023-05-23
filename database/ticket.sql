-

-- show databases;
-- SELECT @@autocommit;

-- drop database db_ticket;
 create database db_ticket;
 use db_ticket;

create table if not exists tb_uf(
cd_uf int not null auto_increment,
sg_uf char(10),
constraint pk_uf
primary key(cd_uf))
engine=InnoDB;
-- Inserção nas tb_uf:
INSERT INTO tb_uf VALUES (1, 'SP');

create table if not exists tb_cidade(
cd_cidade int not null auto_increment,
nm_cidade varchar(45),
cd_uf int,
constraint 
primary key(cd_cidade),
foreign key(cd_uf)
references tb_uf(cd_uf)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB;
-- Inserção nas tb_cidade
INSERT INTO tb_cidade VALUES (1, 'São Vicente', 1);

create table if not exists tb_bairro(
cd_bairro int not null auto_increment,
nm_bairro varchar(45),
cd_cidade int,
constraint pk_bairro
primary key (cd_bairro),
foreign key(cd_cidade)
references tb_cidade(cd_cidade)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB;
-- Inserção nas tb_bairro
INSERT INTO tb_bairro VALUES (1, 'Centro', 1);

create table if not exists tb_login(
cd_login int not null auto_increment,
cd_email_login varchar(45),
cd_senha_login varchar (20),
cd_acesso_login int,
constraint pk_login
primary key(cd_login))
engine=InnoDB;
-- Inserção nas tb_login
INSERT INTO tb_login VALUES (1, 'zaratrusca@gmail.com', '124144mxczx.A', 1);

create table if not exists tb_integrantes(
cd_integrantes int not null auto_increment,
nm_integrante varchar (100),
cd_login int,
cd_bairro int,
constraint pk_integrantes
primary key(cd_integrantes),
foreign key(cd_bairro)
references tb_bairro(cd_bairro),
foreign key(cd_login)
references tb_login(cd_login)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB;
-- Inserção nas tb_integrantes
INSERT INTO tb_integrantes VALUES (1, 'Zaratrusca', 1, 1);

create table if not exists tb_telefone(
cd_telefone int not null auto_increment,
cd_numero1 varchar (20),
cd_integrantes int,
constraint pk_telefone
primary key(cd_telefone),
foreign key(cd_integrantes)
references tb_integrantes(cd_integrantes)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB;
-- Inserção nas tb_telefone
INSERT INTO tb_telefone VALUES (1, '32883090', 1);

create table if not exists tb_atendente(
cd_atendente int not null auto_increment,
status_atendente varchar (50),
cd_email_atendente varchar(45),
cd_senha_atendente varchar (20),
cd_cpf varchar (13),
nm_atendente varchar (75),
constraint pk_atendente
primary key(cd_atendente))
engine=InnoDB;
-- Inserção nas tb_atendente
INSERT INTO tb_atendente VALUES (1, 'ativo', 'jamesclear@gmail.com', 'JS2382d.', '76022010861', 'James Clear');

  create table if not exists tb_descricao_ticket(
    cd_descricao_ticket int not null auto_increment,
    conteudo varchar(500),
    dt_atualizacao_descriacao date,
    hr_atualizacao_descricao datetime,
    constraint pk_descricao_ticket
    primary key(cd_descricao_ticket))
    engine=InnoDB;
    -- Inserção nas tb_descricao_ticket
    INSERT INTO tb_descricao_ticket VALUES (1, 'Falta de água nas torneiras', '2023-01-23', '8:10:09');
    
    create table if not exists tb_avaliacao_atendimento(
	cd_avaliacao_atendimento int not null auto_increment,
	descricao_atendimento varchar (100),
	constraint pk_avaliacao_atendimento
	primary key(cd_avaliacao_atendimento))
	engine=InnoDB;
    -- Inserção nas tb_avaliacao_atendimento
    INSERT INTO tb_avaliacao_atendimento VALUES (1, 'Ótima');
    
      create table if not exists tb_cor_ticket(
    cd_cor_ticket int not null auto_increment,
    nm_cor varchar(50),
    constraint pk_cor_ticket
    primary key(cd_cor_ticket))
    engine=InnoDB;
     -- Inserção nas tb_cor_ticket
    INSERT INTO tb_cor_ticket VALUES (1, 'Vermelho');
    INSERT INTO tb_cor_ticket VALUES (2, 'Amarelo');
    
    create table if not exists tb_gravidade_ticket(
    cd_gravidade_ticket int not null auto_increment,
    nm_gravidade_ticket varchar(50),
    cd_cor int,
    constraint pk_gravidade_ticket
    primary key(cd_gravidade_ticket))
    engine=InnoDB;
 -- Inserção nas tb_gravidade_ticket
    INSERT INTO tb_gravidade_ticket VALUES (1, 'Urgente', 1);
    
    create table if not exists tb_status_ticket(
	cd_status_ticket int not null auto_increment,
	descricao_ticket varchar(50),
	constraint pk_status_ticket
	primary key(cd_status_ticket))
	engine=InnoDB;
     -- Inserção nas tb_status_ticket
    INSERT INTO tb_status_ticket VALUES (1, 'Concluido');
    
create table if not exists tb_ticket(
cd_ticket int not null auto_increment,
cd_descricao_ticket int,
dt_data_inicio date,
dt_data_fim date,
hr_data_inicio datetime,
hr_data_fim datetime,
cd_atendente int,
cd_integrantes int,
cd_gravidade_ticket int,
cd_status_ticket int,
cd_avaliacao_atendimento int,
constraint pk_ticket
primary key(cd_ticket),
foreign key(cd_atendente)
references tb_atendente(cd_atendente),
foreign key(cd_descricao_ticket)
references tb_descricao_ticket(cd_descricao_ticket),
foreign key(cd_integrantes)
references tb_integrantes(cd_integrantes),
foreign key(cd_gravidade_ticket)
references tb_gravidade_ticket(cd_gravidade_ticket),
foreign key(cd_avaliacao_atendimento)
references tb_avaliacao_atendimento(cd_avaliacao_atendimento),
foreign key(cd_status_ticket)
references tb_status_ticket(cd_status_ticket)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB;
 -- Inserção nas tb_ticket
    INSERT INTO tb_ticket VALUES (1, 1, '2017-01-22', '2017-01-23', '12:10:09', '16:10:09', 1, 1, 1, 1, 1);

create table if not exists tb_etec(
cd_etec int not null auto_increment,
nm_instituicao varchar(45),
cd_telefone varchar (20),
cd_cep varchar(20),
sg_uf char (2),
nm_bairro varchar (50),
nm_logradourado varchar (50),
cd_atendente int,
cd_integrantes int,
constraint pk_etec
primary key(cd_etec),
foreign key(cd_integrantes)
references tb_integrantes(cd_integrantes),
foreign key(cd_atendente)
references tb_atendente(cd_atendente))
engine=InnoDB;
-- Inserção nas tb_etec
INSERT INTO tb_etec VALUES (1, 'Etec Doutora Ruth Cardoso', '39870962', '11310-020', 'SP', 'Centro', 'Pr.Cel. Lopes, 387', 1, 1);

select inte.nm_integrante as 'Nome do integrante', log.cd_email_login as 'E-mail do integrante', des.conteudo as 'Descrição do Ticket', ate.nm_atendente as 'Nome do atendente', ate.cd_email_atendente as 'E-mail Atendente', ate.status_atendente as 'Status do atendente', ava.descricao_atendimento as 'Descrição do atendimento', ete.nm_instituicao as 'Nome da instituiçaõ', gra.nm_gravidade_ticket as 'Gravidade do Ticket'
from tb_etec as ete 
join tb_atendente as ate
on ate.cd_atendente = ete.cd_atendente
join tb_integrantes as inte
on inte.cd_integrantes = ete.cd_integrantes
join tb_login as log
on log.cd_login = inte.cd_login
, 
tb_descricao_ticket as des

join  tb_ticket as tik
on tik.cd_descricao_ticket = des.cd_descricao_ticket

join tb_avaliacao_atendimento as ava
on ava.cd_avaliacao_atendimento = tik.cd_avaliacao_atendimento

join tb_gravidade_ticket as gra
on gra.cd_gravidade_ticket = tik.cd_gravidade_ticket;

-- drop database db_ticket;