create table endereco (
    id_endereco int primary key auto_increment,
    cep varchar(8) not null,
    logradouro varchar(255) not null,
    numero varchar(6) not null,
    complemento varchar(255),
    bairro varchar(255) not null,
    cidade varchar(255) not null,
    estado varchar(2) not null
);

create table paciente (
    id_paciente int primary key auto_increment,
    nome varchar(200) not null,
    rg varchar(13) not null unique,
    cpf varchar(11) not null unique,
    cns varchar(15) not null unique,
    telefone varchar(15) not null,
    email varchar(100) not null,
    genero enum('M', 'F') not null,
    nascimento date not null,
    orgao_emissor enum('SSP', 'PC', 'PM', 'outro') not null,
    estado_civil enum('solteiro', 'casado', 'viuvo', 'divorciado', 'uniao estável'),
    limitacoes set('cognitivas', 'auditivas', 'visuais','locomotivas', 'outros'),
    etnias enum('branco', 'preto', 'pardo', 'amarelo', 'indigena') not null,
    tipo_sanguineo enum('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-', 'nulo') not null,
    foto longblob,
    senha varchar(200) not null,
    id_endereco int,
    foreign key (id_endereco) references endereco (id_endereco)
);

create table acompanhante (
    id_acompanhante int primary key auto_increment,
    nome varchar(200) not null,
    cpf varchar(11) not null unique,
    telefone varchar(15) not null,
    tipo enum('pais', 'conjuges', 'irmaos', 'filhos', 'outros') not null,
    id_paciente int,
    foreign key (id_paciente) references paciente(id_paciente)
);

create table medico (
    id_medico int primary key auto_increment,
    nome varchar(200) not null,
    cpf varchar(11) not null unique,
    crm varchar(6) not null unique,
    foto longblob,
    senha varchar(200) not null,
    especialidade enum('odontologia', 'psicologia', 'clinico geral') not null
);

create table horario_medico (
    id_horario int primary key auto_increment,
    data_hora_inicio datetime,
    data_hora_fim datetime,
    disponivel boolean DEFAULT 1,
    id_medico int,
    foreign key (id_medico) references medico(id_medico)
);

create table consulta (
    id_consulta int primary key auto_increment,
    id_medico int,
    id_paciente int,
    data_consulta datetime,
    id_horario int,
    foreign key (id_medico) references medico(id_medico),
    foreign key (id_paciente) references paciente(id_paciente),
    foreign key (id_horario) references horario_medico(id_horario)
);

create table doacao (
    id_doacao int primary key auto_increment,
    id_paciente int,
    tipo_doacao enum('sangue', 'medula') not null,
    ultima_doacao date,
    proxima_doacao date,
    foreign key (id_paciente) references paciente (id_paciente)
);
