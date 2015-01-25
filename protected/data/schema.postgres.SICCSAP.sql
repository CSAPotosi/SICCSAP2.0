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
  direccion varchar (64),
  telefono varchar(32),
  celular varchar(32),
  email varchar(128),
  fotografia varchar(128) default 'default.gif'
);

create table if not exists usuario(
  id_usuario serial primary key not null ,
  nombre varchar (64) unique not null ,
  clave varchar (128) not null,
  id_persona int,
  foreign key (id_persona) references persona(id)
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

create table if not exists registro(
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
CREATE TABLE if not exists especialidad(
  id_especialidad SERIAL primary key not null,
  nombre_especialidad  varchar(50) not null,
  descripcion varchar(128)
);
create table if not exists medico_especialidad(
  id_medico int ,
  id_especialidad int,
  foreign key (id_medico)references medico(id),
  foreign key(id_especialidad) references especialidad(id_especialidad)
);
create table if not exists historial_paciente(
  id int primary key,
  ocupacion_paciente varchar(50),
  grupo_sanguineo_paciente varchar(5),
  tipo_paciente varchar(20),
  fecha_muerte timestamp,
  fecha_creacion timestamp not null,
  fecha_actualizacion timestamp not null,
  foreign key (id) references persona(id)
);
create table if not exists contactos(
  id_persona int,
  id_historial int,
  relacion varchar(64),
  foreign key (id_persona) references persona(id),
  foreign key (id_historial) references historial_paciente(id)
);

create table if not exists consulta(
  id_consulta serial primary key not null ,
  fecha_diagnostico timestamp not null ,
  anamnesis text ,
  exploracion text ,
  diagnostico text ,
  tratamiento text ,
  observaciones text ,
  id_historia int not null ,
  foreign key (id_historia) references historial_paciente(id)
);

create table if not exists capitulo_cie10(
  numero_cap varchar(8) primary key not null ,
  titulo_cap text unique not null ,
  descripcion text
);

create table if not exists cie10(
  codigo varchar(8) primary key not null ,
  titulo text unique not null ,
  descripcion text ,
  codigo_padre varchar (8),
  numero_cap varchar (8) not null ,
  foreign key (codigo_padre) references cie10(codigo),
  foreign key (numero_cap) references capitulo_cie10(numero_cap)
);

create table if not exists clasificacion_diagnostico_cie10(
  id_diagnostico int not null ,
  codigo_cie10 varchar (8) not null ,
  primary key (id_diagnostico,codigo_cie10)
);

create table if not exists reconsulta(
  id_reconsulta serial not null primary key ,
  fecha_reconsulta timestamp not null ,
  evolucion text ,
  tratamiento text ,
  id_consulta int not null ,
  foreign key (id_consulta) references consulta(id_consulta)
);

create table if not exists signos_vitales(
  id_sv serial primary key not null,
  nombre_sv varchar (128) not null unique,
  nombre_corto_sv varchar (64) not null null ,
  tipo_sv varchar (64) not null default 'INDEFINIDO',
  unidad_sv varchar (16) not null default 'INDEFINIDO',
);

create table if not exists consulta_signos_vitales(
  id_consulta int not null,
  id_sv int not null ,
  fecha timestamp not null,
  valor float ,
  observacion text ,
  primary key (id_consulta,id_sv,fecha),
  foreign key (id_consulta) references consulta(id_consulta),
  foreign key (id_sv) references signos_vitales(id_sv)
);

create table medicamento(
  id_med serial primary key not null ,
  nombre_med varchar (128) not null,
  unidad_med varchar (8)
);

create table receta(
  id_diagnostico int not null ,
  id_med int not null,
  fecha date not null ,
  cantidad int not null,
  indicaciones text ,
  primary key (id_diagnostico,id_med,fecha),
  foreign key (id_diagnostico) references diagnostico(id_diagnostico),
  foreign key (id_med) references medicamento(id_med)
);

create table tipo_antecedente(
  id_tipo_ant serial primary key not null,
  titulo varchar(32) not null unique,
  genero_aplicado varchar(1) default 'I',
  descripcion varchar(128)
);

create table antecedente_medico(
  fecha_creacion timestamp,
  fecha_modificacion timestamp,
  descripcion_ant text,
  id_historia int,
  id_tipo int,
  foreign key (id_historia) references historial_paciente(id),
  foreign key (id_tipo) references tipo_antecedente(id_tipo_antecedente),
  primary key(fecha_creacion,id_historia,id_tipo)
);
