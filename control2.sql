drop database test;
create database test;
use test;

CREATE TABLE alumnos (
  id int primary key auto_increment,
  Nombre varchar(50),
  Apellido varchar(50),
  Sexo tinyint(4),
  FechaNacimiento varchar(20),
  Prueba tinyint(6),
  FechaRegistro varchar(20)
  
) ;

INSERT INTO alumnos (Nombre, Apellido, Sexo, FechaNacimiento, Prueba, FechaRegistro) VALUES ('EDUARDO', 'rodriguez patiño', 1, '1989-02-11', 1,'2014-05-26'),
	('lucia', 'rodriguez gonzales', 2, '1985-04-11', 1,'2014-05-26'),
	('pedro', 'suarez patiño', 1, '1991-08-17', 2,'2014-05-26'),
	('Raul', 'Perez', 1, '1989-03-15', 1,'2014-05-26');




drop database covid;
drop table login;
  
create database covid;
use covid;    
   
 
CREATE TABLE login (
	id int primary key auto_increment,
    nombres varchar (40),
    apellidos varchar (40),
    dni char (8),
    sexo char (1),
    celular char (9),
    usuario varchar (40),
    passwor varchar (60),
    
    constraint check_sexo check (sexo in ('M','F'))
);

INSERT INTO login (nombres, apellidos, dni, sexo, celular, usuario, passwor) VALUES ('EDU', 'ROBLES QUIÑONEZ', 11112222, 'M','999888999', 'edurobles@gmail.com', '123456'),   
('MILAGROS', 'REYES QUIÑONEZ', 11112222, 'F','999888999', 'milagrosreyes@gmail.com', '123456'), 
('TANIA', 'RAMOS QUIÑONEZ', 11112222, 'F','999888999', 'taniaramoss@gmail.com', '123456'), 
('EDUARBO', 'ROBLES QUIÑONEZ', 11112222, 'M','999888999', 'eduardorobles@gmail.com', '123456');    
   
   
CREATE TABLE inspectores (
  id int primary key auto_increment,
  Nombre varchar(50),
  Apellido varchar(50),
  Sexo tinyint(4),
  Prueba tinyint(4),
  FechaRegistro varchar(20)
);

INSERT INTO inspectores (Nombre, Apellido, Sexo, Prueba, FechaRegistro) VALUES ('eduardo', 'rodriguez patiño', 1, 1,'2021-06-01'),
('lucia', 'rodriguez gonzales', 2, 1,'2021-06-01'),
('pedro', 'suarez lopez', 1, 2,'2021-06-02'),
('raul', 'perez angulo', 1, 1,'2021-06-02');
    
    
CREATE TABLE personales (
  id int primary key auto_increment,
  Nombre varchar(50),
  Apellido varchar(50),
  Sexo tinyint(4),
  FechaNacimiento varchar(20),
  Prueba tinyint(4),
  FechaRegistro varchar(20)
);

INSERT INTO personales (Nombre, Apellido, Sexo, FechaNacimiento, Prueba, FechaRegistro) VALUES ('nilton', 'reyes rodriguez', 1, '1989-02-11', 1,'2021-06-01'),
('tula', 'rodriguez gonzales', 2, '1985-04-11', 1,'2021-06-01'),
('pedro', 'lazarte ortega', 1, '1991-08-17', 2,'2021-06-02'),
('timoteo', 'huaman capcha', 1, '1989-03-15', 1,'2021-06-02');
    