/* comando para insertar desde archivo \i ubicacion del archivo ej c:wamp/www/schema.postgres.SICCSAP.sql*/
drop database if exists siccsap;
create database if not exists siccsap;

/* Oso */
///////////////////////////////////////////////////////////////////////

/*tabla persona*/
create table if not exists persona(
  id serial not null primary key ,
  dni varchar(32),
  nit varchar(32),
  nombres varchar(128),
  primer_apellido varchar(64),
  segundo_apellido varchar(64),
  sexo varchar (16),
  fecha_nacimiento timestamp ,
  estado_civil varchar(32),
  pais varchar(64),
  provincia varchar(64),
  localidad varchar(64),
  telefono varchar(32),
  celular varchar(32),
  email varchar(128),
  fotografia varchar(128) default 'default.gif'
);


create table if not exists empleado(
  id int primary key ,
  fecha_contratacion date ,
  profesion varchar(32),
  estado varchar (16),
  foreign key (id) references persona(id)
);


create table if not exists unidad(
  id_unidad serial primary key ,
  nombre_unidad varchar(32) not null unique,
  descripcion_unidad varchar(128)
);

create table if not exists cargo(
  id_cargo serial primary key ,
  nombre_cargo varchar (32) not null unique ,
  descripcion_cargo varchar(128),
  id_unidad int,
  foreign key (id_unidad) references unidad(id_unidad)
);

create table if not exists horario(
  id_horario serial primary key ,
  nombre_horario varchar(32) not null unique,
  tipo_horario varchar (32)
);

create table turno(
  id_turno serial primary key ,
  nombre_turno varchar(32) not null unique ,
  tipo_turno varchar(8)
  hora_ingreso time not null,
  hora_salida time not null,
  tolerancia int default 0,
  id_horario int,
  foreign key (id_horario) references  horario(id_horario)
);

create table registro(
  id_asistencia serial primary key ,
  fecha_hora_registro timestamp ,
  observaciones varchar(128),
  id_empleado int,
  foreign key (id_empleado) references empleado(id_empleado)
);

create table if not exists asignacion_empleado(
  id_asignacion serial primary key,
  fecha_inicio date,
  fecha_fin date,
  id_empleado int,
  id_cargo int,
  id_horario int,
  foreign key (id_empleado) references empleado(id),
  foreign key (id_cargo) references cargo(id_cargo),
  foreign key (id_horario) references horario(id_horario)
);

create table if not exists medico(
  id int not null primary key,
  matricula varchar(32) unique not null,
  colegiatura varchar(64),
  estado varchar(16),
  foreign key (id) references persona (id)
);






