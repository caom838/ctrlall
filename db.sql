CREATE DATABASE ctrlall;
USE ctrlall;

Create table empresas(
    idEmpresa int auto_increment,
    nitEmpresa varchar (11) not null, 
    nombre varchar (30) not null,           
    telefono varchar (10),
    direccion varchar (60),
    email varchar (30),         #E_mail -> email 
    Primary Key (idEmpresa) 
);

Create table cargos(
    idCargo int auto_increment, 
    nombre varchar(25) not NULL,
    entrada time not null, 
    salida time not null,
    idEmpresa int,
    Primary Key (idCargo),
    Foreign Key (idEmpresa) references empresas (idEmpresa)
);

Create table asistencias(
    idAsistencia int auto_increment,
    entradaHora datetime not null,
    salidaHora datetime not null,
    entradaFecha date not null,
    salidaFecha date not null,

    idCargo int,
    Primary Key (idAsistencia),
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
    idEmpresa int,
    PRIMARY KEY (idJefe),
    Foreign Key (idEmpresa) references empresas (idEmpresa)
);

Create table empleados(
    idEmpleado int auto_increment, 
    nombre varchar (30) not null,
    apellido varchar (30) not null,
    pw varchar (23) not null,
    cc varchar(10) not null,
    cargo varchar (50) not null, 
    telefono int not null,
    email varchar (30) not null,
    idEmpresa int, 
    idCargo int,  
    Primary Key (idEmpleado),
    Foreign Key (idEmpresa) references empresas (idEmpresa),
    Foreign Key (idCargo) references cargos (idCargo)
);

CREATE TABLE admin(
    idAdmin int auto_increment PRIMARY KEY,
    nombre varchar (30) not null,
    pw varchar (23) not null
);

#sql to create a user for DATABASE
#CREATE USER 'ctrall_team'@'%' IDENTIFIED VIA mysql_native_password USING '***';GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'ctrall_team'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;GRANT ALL PRIVILEGES ON `ctrlall`.* TO 'ctrall_team'@'%';

    #Con amor para CTRLAll          