/* comando para insertar desde archivo \i ubicacion del archivo ej c:wamp/www/schema.postgres.SICCSAP.sql*/

/* Oso */
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
  descripcion_unidad varchar(128),
  estado varchar(16)
);
create table if not exists cargo(
  id_cargo serial primary key ,
  nombre_cargo varchar (32) not null unique ,
  descripcion_cargo varchar(128),
  id_unidad int,
  estado varchar(16),
  foreign key (id_unidad) references unidad(id_unidad)
);
create table if not exists horario(
  id_horario serial primary key ,
  nombre_horario varchar(32) not null unique,
  tipo_horario varchar (32),
  estado varchar(16)
);
create table turno(
  id_turno serial primary key ,
  nombre_turno varchar(32) not null unique ,
  tipo_turno varchar(8),
  hora_entrada time not null,
  inicio_entrada int,
  fin_entrada int,
  hora_salida time not null,
  inicio_salida int,
  fin_salida int,
  tolerancia int default 0,
  dias varchar(7),
  id_horario int,
  foreign key (id_horario) references  horario(id_horario)
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

create table registro(
  id_asignacion int not null,
  fecha date not null,
  hora_asistencia time not null,
  observaciones varchar(128),
  estado bool,
  primary key(fecha,hora_asistencia,id_asignacion),
  foreign key (id_asignacion) references asignacion_empleado(id_asignacion)
);
create table if not exists medico(
  id int not null primary key,
  matricula varchar(32) unique not null,
  colegiatura varchar(64),
  estado varchar(16),
  foreign key (id) references persona (id)
);
CREATE TABLE especialidad(
  id_especialidad SERIAL primary key not null,
  nombre_especialidad  varchar(50) not null,
  descripcion varchar(128)
);
create table medico_especialidad(
  id_medico int ,
  id_especialidad int,
  foreign key (id_medico)references medico(id),
  foreign key(id_especialidad) references especialidad(id_especialidad)
);
create table historial_paciente(
  id int primary key,
  ocupacion_paciente varchar(50),
  grupo_sanguineo_paciente varchar(5),
  tipo_paciente varchar(20),
  fecha_muerte timestamp,
  fecha_creacion timestamp not null,
  fecha_actualizacion timestamp not null,
  foreign key (id) references persona(id)
);
create table contactos(
  id_persona int,
  id_historial int,
  relacion varchar(64),
  foreign key (id) references persona(id),
  foreign key (id) references historial_paciente(id)
);