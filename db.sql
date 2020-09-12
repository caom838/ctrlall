CREATE DATABASE ctrlall;
USE ctrlall;

Create table empresas(
    nitEmpresa varchar (11) not null, 
    nombre varchar (30) not null,           
    telefono varchar (10),
    direccion varchar (60),
    email varchar (30),         #E_mail -> email 
    Primary Key (nitEmpresa) 
);

Create table cargos(
    idCargo int not null auto_increment, 
    noCargo int not null,          #NºCargos  -> noCargo
    noPersonas int not null,                  #NºPersonas -> noPersonas
    llegada datetime not null, 
    salida datetime not null,
    nitEmpresa varchar (11),
    Primary Key (idCargo),
    Foreign Key (nitEmpresa) references empresas (nitEmpresa)
);

Create table horarios(
    idHorario int not null auto_increment,
    entrada time not null,
    salida time not null,
    idCargo int,
    Primary Key (idHorario),
    Foreign Key (idCargo) references cargos (idCargo)
);

Create table jefes(                             
    idJefe int auto_increment,
    nombre varchar (30) not null,
    apellido varchar (30) not null,
    pw varchar (23) not null,
    cc varchar(10) not null,
    telefono int,
    email varchar (30),
    nitEmpresa varchar (11),
    idCargo int,
    idHorario int,
    PRIMARY KEY (idJefe),
    Foreign Key (nitEmpresa) references empresas (nitEmpresa),
    Foreign Key (idCargo) references cargos (idCargo),
    Foreign Key (idHorario) references horarios (idHorario)
);

Create table empleados(
    idEmpleado int auto_increment, 
    nombre varchar (30) not null,
    apellido varchar (30) not null,
    pw varchar (23) not null,
    cc varchar(10) not null,
    cargo varchar (50) not null, 
    telefono int not null,
    direccion varchar (20),
    email varchar (30) not null,
    nitEmpresa varchar(11), 
    idCargo int, 
    idHorario int, 
    idJefe int,
    Primary Key (idEmpleado),
    Foreign Key (nitEmpresa) references empresas (nitEmpresa),
    Foreign Key (idCargo) references cargos (idCargo),
    Foreign Key (idHorario) references horarios (idHorario),
    Foreign Key (idJefe) references jefes (idJefe)
);

CREATE TABLE admin(
    idAdmin int auto_increment PRIMARY KEY,
    nombre varchar (30) not null,
    pw varchar (23) not null
);

// sql to create a user for DATABASE
//CREATE USER 'ctrall_team'@'%' IDENTIFIED VIA mysql_native_password USING '***';GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'ctrall_team'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;GRANT ALL PRIVILEGES ON `ctrlall`.* TO 'ctrall_team'@'%';

    #Con amor para CTRLAll