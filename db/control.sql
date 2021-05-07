drop database control;
create database control;
use control;

create table administrador (
	id int primary key auto_increment,
    nombres varchar (40),
    apellidos varchar (40),
    dni char (8),
    sexo char (1),
    celular char (9),
    usuario varchar (40),
    passwor varchar (60), 
    
    constraint check_sexo check (sexo in ('m','f'))
);

create table municipalidad (
	id int primary key auto_increment,
    nombres varchar (40),
    apellidos varchar (40),
    dni char (8),
    sexo char (1),
    grado varchar (20),
    celular char (9),
    usuario varchar (40),
    passwor varchar (60),
    
    constraint check_sexo check (sexo in ('m','f'))
);

create table policias (
	id int primary key auto_increment,
    nombres varchar (40),
    apellidos varchar (40),
    dni char (8),
    sexo char (1),
    grado varchar (20),
    celular char (9),
    usuario varchar (40),
    passwor varchar (60),
    
    constraint check_sexo check (sexo in ('m','f'))
);

create table viajes (
	id int primary key auto_increment,
    nombre_empresa varchar (40),
    matricula_vehiculo varchar (20),
    numero_boleto varchar (10),
    fecha date,
    tipo char (5),
    
	constraint check_tipo check (tipo in ('aereo', 'terre'))
);

create table personal (
	id int primary key auto_increment,
    nombres varchar (40),
    apellidos varchar (40),
    dni char (8),
    sexo char (1),
    grado varchar (20),
    celular char (9),
    usuario varchar (40),
    passwor varchar (60),
    
	constraint check_sexo check (sexo in ('m','f'))
);

create table lugar_cuarentena (
	id int primary key	auto_increment,
    nombre_local varchar (40),
	direccion_local varchar (40),
    fecha_hora_ingreso datetime,
    fecha_hora_salida datetime,
    id_personal int,
    id_intervenidos int,
    
    constraint fk_personal FOREIGN KEY (id_personal) REFERENCES personal(id)
);

create table intervenidos (
	id int primary key auto_increment,
    nombres varchar (40),
    apellidos varchar (40),
    dni char (8),
    edad int,
    sexo char (1),
    lugar_origen varchar (40),  
    id_viajes int,
    
    constraint fk_viaje FOREIGN KEY (id_viajes) REFERENCES viajes(id),
    constraint check_sexo check (sexo in ('m','f'))
);

create table detalles_inspeccion (
	id int primary key	auto_increment,
    fecha_hora datetime,
    zona_intervencion varchar (40),
    prueba_resultado char (8),
    institucion_resultado varchar (40),
    motivo_viaje varchar (100),
    id_policias int,
    id_intervenidos int,

	constraint fk_policias FOREIGN KEY (id_policias) REFERENCES policias(id),
    constraint fk_intervenidos FOREIGN KEY (id_intervenidos) REFERENCES intervenidos(id),
    constraint check_resultado check (prueba_resultado in ('positivo', 'negativo'))
);

create table usuarios (
	id int primary key auto_increment,
    id_administrador int,
    id_policias int,
    id_personal int,
    id_municipalidad int,
        
    constraint fk_administradores FOREIGN KEY (id_administrador) REFERENCES administrador(id),
    constraint fk_policia FOREIGN KEY (id_policias) REFERENCES policias(id),
    constraint fk_personales FOREIGN KEY (id_personal) REFERENCES personal(id),
    constraint fk_municipalidades FOREIGN KEY (id_municipalidad) REFERENCES municipalidad(id)
);

#INSERTANDO ADMINISTRADOR
insert into administrador (nombres, apellidos, dni, sexo, celular, usuario, passwor) values ("andres juaquin", "lopez lozano", "11112222", "m", "999111222", "andres@gmail.com", "123456");
insert into administrador (nombres, apellidos, dni, sexo, celular, usuario, passwor) values ("angel", "luna altamirano", "22221111", "m", "999222111", "angels@gmail.com", "123456");
#select * from administrador;

#INSERTANDO MUNICIPALIDAD
insert into municipalidad (nombres, apellidos, dni, sexo, grado, celular, usuario, passwor) values ("martin", "vizcarra ojeda", "22223333", "m", "gerente", "999111333", "martin@gmail.com", "123456");
insert into municipalidad (nombres, apellidos, dni, sexo, grado, celular, usuario, passwor) values ("natalie bonita", "suelperes tineo", "33334444", "f", "subgerente", "999333111", "bonita@gmail.com", "123456");
#select * from municipalidad;

#INSERTANDO POLICIAS
insert into policias (nombres, apellidos, dni, sexo, grado, celular, usuario, passwor) values ("juan mario", "perez trujillo", "12345678", "m", "teniente", "999888777", "juanmario@outlook.com", "123456");
insert into policias (nombres, apellidos, dni, sexo, grado, celular, usuario, passwor) values ("maria lupita", "alcantara poma", "23456789", "f", "oficial", "999888777", "marialupita@outlook.com", "123456");
insert into policias (nombres, apellidos, dni, sexo, grado, celular, usuario, passwor) values ("piero", "zamora araujo", "34567810", "m", "capitan", "999888777", "piero@outlook.com", "123456");
insert into policias (nombres, apellidos, dni, sexo, grado, celular, usuario, passwor) values ("evicita linda", "torres rojas", "45678910", "f", "subteniente", "999888777", "evicitalinda@gmail.com", "123456");
insert into policias (nombres, apellidos, dni, sexo, grado, celular, usuario, passwor) values ("helar ", "camero nuñez", "56781011", "m", "sargento", "999888777", "helar@gmail.com", "123456");
insert into policias (nombres, apellidos, dni, sexo, grado, celular, usuario, passwor) values ("bonita", "pinedo ayala", "67891011", "f", "subteniente", "999888777", "bonita@gmail.com", "123456");
#select * from policias;

#INSERTANDO VIAJES
insert into viajes (nombre_empresa, matricula_vehiculo, numero_boleto, fecha, tipo) values ("orion", "abcd01", "a0001", "2021-03-14", "aereo");
insert into viajes (nombre_empresa, matricula_vehiculo, numero_boleto, fecha, tipo) values ("chosicano", "abcd02", "a0002", "2021-04-15", "terre");
insert into viajes (nombre_empresa, matricula_vehiculo, numero_boleto, fecha, tipo) values ("rapido", "abcd03", "a0003", "2021-05-20", "aereo");
insert into viajes (nombre_empresa, matricula_vehiculo, numero_boleto, fecha, tipo) values ("lan", "abcd04", "a0004", "2021-05-24", "aereo");
insert into viajes (nombre_empresa, matricula_vehiculo, numero_boleto, fecha, tipo) values ("gym", "abcd05", "a0005", "2021-05-25", "terre");
insert into viajes (nombre_empresa, matricula_vehiculo, numero_boleto, fecha, tipo) values ("bahia", "abcd06", "a0006", "2021-05-30", "terre");
#select * from viajes;

#INSERTANDO PERSONAL
insert into personal (nombres, apellidos, dni, sexo, grado, celular, usuario, passwor) values ("monica li", "tineo rivera", "77770000", "f", "enfermera", "999888777", "monicali@gmail.com", "123456");
insert into personal (nombres, apellidos, dni, sexo, grado, celular, usuario, passwor) values ("luzmila", "tello portocarrero", "77771111", "f", "enfermera", "999777888", "luzmila@gmail.com", "123456");
insert into personal (nombres, apellidos, dni, sexo, grado, celular, usuario, passwor) values ("mari paz", "benavides soto", "77772222", "f", "enfermera", "999888999", "maripaz@gmail.com", "123456");
insert into personal (nombres, apellidos, dni, sexo, grado, celular, usuario, passwor) values ("carlos alberto", "torres rivera", "77773333", "m", "enfermero", "999777666", "carlosalbertoi@gmail.com", "123456");
insert into personal (nombres, apellidos, dni, sexo, grado, celular, usuario, passwor) values ("mirtha blanca flor", "falcon reyes", "77774444", "f", "enfermera", "999666777", "mirthablancaflor@gmail.com", "123456");
insert into personal (nombres, apellidos, dni, sexo, grado, celular, usuario, passwor) values ("julio martin", "ojeda torres", "77775555", "m", "enfermero", "999777555", "juliomartin@gmail.com", "123456");
#select * from personal;

#INSERTANDO LUGAR_CUARENTENA
insert into lugar_cuarentena (nombre_local, direccion_local, fecha_hora_ingreso, fecha_hora_salida, id_personal, id_intervenidos) values ("san pedro", "jiron 2 de mayo #478", "2021-03-14T14:25:10", "2021-03-18T09:09:34", 1, null);
insert into lugar_cuarentena (nombre_local, direccion_local, fecha_hora_ingreso, fecha_hora_salida, id_personal, id_intervenidos) values ("san cristobal", "jiron 28 de julio #521", "2021-03-14T16:25:10", "2021-03-18T13:45:32", 2, null);
insert into lugar_cuarentena (nombre_local, direccion_local, fecha_hora_ingreso, fecha_hora_salida, id_personal, id_intervenidos) values ("san juan", "jiron mayro #350", "2021-04-15T20:25:10", null, 3, null);
insert into lugar_cuarentena (nombre_local, direccion_local, fecha_hora_ingreso, fecha_hora_salida, id_personal, id_intervenidos) values ("san judas", "jiron independencia #1478", "2021-04-15T20:45:00", null, 4, null);
insert into lugar_cuarentena (nombre_local, direccion_local, fecha_hora_ingreso, fecha_hora_salida, id_personal, id_intervenidos) values ("cucardas", "jiron venezuela #1080", "2021-05-20T21:12:18", null, 5, null);
insert into lugar_cuarentena (nombre_local, direccion_local, fecha_hora_ingreso, fecha_hora_salida, id_personal, id_intervenidos) values ("playboy", "jiron colombia #1234", "2021-05-24T22:34:02", null, 6, null);
#select * from lugar_cuarentena;

#INSERTANDO INTERVENIDOS
insert into intervenidos (nombres, apellidos, dni, edad, sexo, lugar_origen, id_viajes) values ("pedro pablo", "linares sotelo", "88888888", 21, "m", "tingo maria", 1);
insert into intervenidos (nombres, apellidos, dni, edad, sexo, lugar_origen, id_viajes) values ("joselyn pamela", "paredes soto", "99999999", 23, "f", "tarapoto", 1);
insert into intervenidos (nombres, apellidos, dni, edad, sexo, lugar_origen, id_viajes) values ("luisa maria", "zevallos cerrano", "77777777", 45, "f", "lima", 2);
insert into intervenidos (nombres, apellidos, dni, edad, sexo, lugar_origen, id_viajes) values ("julio tadeo", "rengifo reyes", "88887777", 32, "m", "pucalpa", 2);
insert into intervenidos (nombres, apellidos, dni, edad, sexo, lugar_origen, id_viajes) values ("carlos manuel", "baca cornelio", "77778888", 47, "m", "oxapampa", 3);
insert into intervenidos (nombres, apellidos, dni, edad, sexo, lugar_origen, id_viajes) values ("carlos enrique", "garcia trejo", "88777788", 31, "m", "tingo maria", 4);
#select * from intervenidos;

#INSERTANDO DETALLE_INSPECCION
insert into detalles_inspeccion (fecha_hora, zona_intervencion, prueba_resultado, institucion_resultado, motivo_viaje, id_policias, id_intervenidos) values ("2021-03-14T08:12:10", "jiron huallayco-huanuco", "negativo", "santa catalina", "trabajo", 2, 1);
insert into detalles_inspeccion (fecha_hora, zona_intervencion, prueba_resultado, institucion_resultado, motivo_viaje, id_policias, id_intervenidos) values ("2021-03-14T14:25:00", "jiron abtao-huanuco", "negativo", "clinica internacional", "familia", 2, 2);
insert into detalles_inspeccion (fecha_hora, zona_intervencion, prueba_resultado, institucion_resultado, motivo_viaje, id_policias, id_intervenidos) values ("2021-04-15T16:14:09", "jiron pedro puelles-huanuco", "positivo", "clinica ricardo palma", "trabajo", 3, 3);
insert into detalles_inspeccion (fecha_hora, zona_intervencion, prueba_resultado, institucion_resultado, motivo_viaje, id_policias, id_intervenidos) values ("2021-04-15T18:45:00", "jiron constitucion-huanuco", "positivo", "hospital de la solidaridad", "trabajo", 1, 4);
insert into detalles_inspeccion (fecha_hora, zona_intervencion, prueba_resultado, institucion_resultado, motivo_viaje, id_policias, id_intervenidos) values ("2021-05-20T19:12:18", "jiron abtao-huanuco", "negativo", "santa pierina", "trabajo", 2, 5);
insert into detalles_inspeccion (fecha_hora, zona_intervencion, prueba_resultado, institucion_resultado, motivo_viaje, id_policias, id_intervenidos) values ("2021-05-24T20:34:02", "jiron constitucion-huanuco","negativo", "hospital sergio bernales", "familia", 4, 6);
#select * from detalles_inspeccion;

#INSERTANDO USUARIOS
insert into usuarios (id_administrador, id_policias, id_personal, id_municipalidad) values (1, 1, 1, 1);
insert into usuarios (id_administrador, id_policias, id_personal, id_municipalidad) values (2, 2, 2, 2);
#select * from usuarios;
