/* comando para insertar desde archivo \i ubicacion del archivo ej c:wamp/www/schema.postgres.SICCSAP.sql*/

/* Oso */
/*tabla persona*/
create table if not exists persona(
  id serial not null primary key ,
  dni varchar(32) not null default '0',
  nit varchar(32),
  nombres varchar(128) not null ,
  primer_apellido varchar(64) not null,
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
create table if not exists turno(
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
create table if not exists empresa(
  id_empresa serial not null primary key ,
  nit varchar(16),
  nombre varchar(128) not null,
  direccion varchar(128),
  telefono varchar (32),
);

create table if not exists historial_paciente(
  id int primary key,
  ocupacion_paciente varchar(50),
  grupo_sanguineo_paciente varchar(5),
  tipo_paciente varchar(20),
  fecha_muerte timestamp,
  fecha_creacion timestamp not null,
  fecha_actualizacion timestamp not null,
  id_contacto int,
  id_titular int,
  id_empresa int ,
  foreign key (id) references persona(id),
  foreign key (id_contacto) references persona(id),
  foreign key (id_titular) references historial_paciente(id),
  foreign key (id_empresa) references empresa(id_empresa)
);

create table if not exists consulta(
  id_consulta serial primary key not null ,
  fecha_diagnostico timestamp not null ,
  anamnesis text ,
  exploracion text ,
  diagnostico text ,
  observaciones text ,
  id_historia int not null ,
  id_consulta_padre int,
  foreign key (id_historia) references historial_paciente(id),
  foreign key (id_consulta_padre) references consulta(id_consulta)
);


create table if not exists signos_vitales(
  id_sv serial primary key not null,
  nombre_sv varchar (128) not null unique,
  nombre_corto_sv varchar (64) not null,
  tipo_sv varchar (64) not null default 'INDEFINIDO',
  unidad_sv varchar (16) not null default 'INDEFINIDO'
);


create table if not exists consulta_signos_vitales(
  id_consulta int not null,
  id_sv int not null ,
  fecha timestamp not null,
  valor varchar(16),
  primary key (id_consulta,id_sv,fecha),
  foreign key (id_consulta) references consulta(id_consulta),
  foreign key (id_sv) references signos_vitales(id_sv)
);

create table if not exists medicamento(
  id_med serial primary key not null ,
  nombre_med varchar (128) not null,
  unidad_med varchar (8)
);

create table if not exists tratamiento(
  id_tratamiento serial not null primary key,
  fecha_tratamiento timestamp not null,
  indicaciones text,
  id_consulta int,
  foreign key (id_consulta) references consulta(id_consulta)
);

create table if not exists receta(
  id_receta serial not null primary key ,
  id_med int not null,
  cantidad int not null,
  duracion_tratamiento varchar(128),
  indicaciones text ,
  via varchar(128),
  info_adicional text,
  id_tratamiento int not null,
  foreign key (id_med) references medicamento(id_med),
  foreign key (id_tratamiento) references tratamiento(id_tratamiento)
);

create table if not exists tipo_antecedente(
  id_tipo_ant serial primary key not null,
  titulo varchar(32) not null unique,
  genero_aplicado varchar(1) default 'I',
  descripcion varchar(128)
);

create table if not exists antecedente_medico(
  fecha_creacion timestamp,
  fecha_modificacion timestamp,
  descripcion_ant text,
  id_historia int,
  id_tipo int,
  foreign key (id_historia) references historial_paciente(id),
  foreign key (id_tipo) references tipo_antecedente(id_tipo_ant),
  primary key(fecha_creacion,id_historia,id_tipo)
);


//parte cie 10

create table if not exists capitulo_cie10(
  num_capitulo varchar(8) primary key not null,
  titulo_cap text not null unique,
  descripcion_cap text,
  codigo_inicial varchar(8) not null,
  codigo_final varchar(8) not null
);

create table if not exists categoria_cie10(
  id_cat_cie10 serial primary key not null,
  titulo_cat_cie10 text unique not null,
  descripcion text,
  codigo_inicial varchar(8) not null,
  codigo_final varchar(8) not null,
  num_capitulo varchar(8) not null,
  foreign key (num_capitulo) references capitulo_cie10(num_capitulo)
);

create table if not exists item_cie10(
  codigo varchar(8) primary key not null,
  titulo text not null unique,
  descripcion text,
  codigo_item_padre varchar(8),
  id_cat_cie10 int not null,
  foreign key (codigo_item_padre) references item_cie10(codigo),
  foreign key (id_cat_cie10) references categoria_cie10(id_cat_cie10)
);

create table if not exists consulta_cie10(
  id_consulta int not null ,
  codigo_cie10 varchar(8) not null ,
  foreign key (id_consulta) references consulta(id_consulta),
  foreign key (codigo_cie10) references item_cie10(codigo),
  primary key (id_consulta,codigo_cie10)
);

create table if not exists servicio(
  id_servicio serial not null primary key,
  fecha_creacion_servicio timestamp,
  fecha_modificacion_servicio timestamp
);

create table if not EXISTS costos(
  id_costo serial not null primary key,
  fecha_inicio timestamp not null,
  fecha_fin timestamp,
  monto float not null,
  id_servicio int not null
);

create table if not EXISTS tipo_sala(
  id_tipo_sala int not null primary key,
  nombre_tipo_sala varchar(128) unique not null,
  descripcion_tipo_sala varchar(128) ,
  foreign key (id_tipo_sala) references servicio(id_servicio)
);

create table if not exists sala(
  id_sala serial not null primary key,
  numero_sala int not null,
  ubicacion_sala varchar(128),
  estado_sala varchar(32),
  id_tipo_sala int not null,
  foreign key (id_tipo_sala) references tipo_sala(id_tipo_sala)
);
/*
create table if not EXISTS categoria_servicio(
  id_categoria_serv serial not null primary key,
  nombre_categoria varchar(128) not null unique,
  descripcion_categoria_serv varchar(128)
);

create table if not EXISTS servicio_medico(
  id_servicio_medico int not null primary key,
  nombre_servicio varchar(128) not null unique,
  descripcion_servicio varchar(128),
  id_categoria_serv int not null,
  foreign key (id_servicio_medico) references servicio(id_servicio),
  foreign key (id_categoria_serv) references categoria_servicio(id_categoria_serv)
);

*/


