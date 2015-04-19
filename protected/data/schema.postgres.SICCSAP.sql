/* comando para insertar desde archivo \i ubicacion del archivo ej c:wamp/www/schema.postgres.SICCSAP.sql*/

/* Oso */
/*tabla persona*/
create table if not exists pais(
  id_pais serial not null primary key ,
  nombre varchar (32),
  codigo_pais varchar (8)
);

create table if not exists persona(
  id serial not null primary key ,
  codigo varchar(16) not null,
  dni varchar(32) not null ,
  nombres varchar(128) not null,
  primer_apellido varchar(64) not null ,
  segundo_apellido varchar(64),
  sexo varchar (32),
  fecha_nacimiento timestamp ,
  estado_civil varchar(32),
  pais_nacimiento int,
  provincia varchar(64),
  localidad varchar(64),
  nivel_estudio varchar(32),
  pais_vive int,
  direccion varchar (64),
  telefono varchar(32),
  celular varchar(32),
  email varchar(128),
  fotografia varchar(128),
  foreign key (pais_nacimiento) references pais(id_pais),
  foreign key (pais_vive) references pais(id_pais)
);
create table if not exists paciente(
  id_paciente int primary key not null,
  ocupacion_paciente varchar(32),
  grupo_sanguineo_paciente varchar(16),
  estado_paciente varchar(32),
  id_contacto_paciente int,
  foreign key (id_paciente) references persona(id),
  foreign key (id_contacto_paciente) references persona(id)
);
create table if not exists historial_paciente(
  id_historial serial primary key not null,
  fecha_muerte timestamp,
  fecha_creacion timestamp not null,
  fecha_actualizacion timestamp not null,
  foreign key (id_historial) references paciente(id_paciente)
);

create table if not exists empleado(
  id int primary key ,
  fecha_contratacion date ,
  profesion varchar(32),
  estado varchar (16),
  foreign key (id) references persona(id)
);

create table if not exists usuario(
  id_usuario serial primary key not null ,
  nombre varchar (64) unique not null ,
  clave varchar (128) not null,
  id_empleado int,
  foreign key (id_empleado) references empleado(id)
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
  id_M_E serial not null primary key,
  id_medico int ,
  id_especialidad int,
  foreign key (id_medico)references medico(id),
  foreign key(id_especialidad) references especialidad(id_especialidad)
);
create table if not exists empresa(
  id_empresa serial primary key not null,
  nombre varchar(128)not null,
  direccion varchar(128),
  telefono int
);
create table if not exists convenio(
  id_convenio serial primary key not null,
  nombre varchar(128)
);
create table if not exists asegurado(
  id_asegurado varchar(16) primary key not null,
  id_convenio int,
  foreign key (id_convenio) references convenio(id_convenio)
);
create table if not exists convenio_empresa(
  fecha_inicio date not null,
  fecha_fin date,
  id_empresa int not null,
  id_convenio int not null,
  foreign key (id_empresa) references empresa(id_empresa),
  foreign key (id_convenio) references convenio(id_convenio)
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
  foreign key (id_historia) references historial_paciente(id_historial),
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
  foreign key (id_historia) references historial_paciente(id_historial),
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
  id_servicio serial not null primary key.
  codigo_serv varchar(16) ,
  nombre_serv varchar(128),
  unidad_serv varchar(64),
  fecha_creacion timestamp not null,
  fecha_actualizacion timestamp not null,
  id_empresa int not null,
  foreign key(id_empresa) references empresa(id_empresa)
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
create table if not exists precio_servicio(
  id_servicio int not null,
  fecha_inicio timestamp not null,
  fecha_fin timestamp,
  monto float,
  primary key(id_servicio,fecha_inicio),
  foreign key(id_servicio) references servicio(id_servicio)
);

create table if not exists atencion_medica(
  id_servicio int primary key,
  tipo_atencion varchar(16) not null,
  id_M_E int not null,
  foreign key (id_servicio) references servicio(id_servicio),
  foreign key (id_M_E) references medico_especialidad(id_M_E)
);

create table if not exists categoria_ex_laboratorio(
  id_cat_lab serial not null primary key,
  codigo_cat_lab varchar(8) unique,
  nombre_cat_lab varchar(32) not null
);

create table if not exists examen_laboratorio(
  id_servicio int primary key,
  id_cat_lab int not null,
  foreign key(id_servicio) references servicio(id_servicio),
  foreign key(id_cat_lab) references categoria_ex_laboratorio(id_cat_lab)
);

create table if not exists categoria_ex_gabinete(
  id_cat_gab serial not null primary key,
  codigo_cat_gab varchar(8) unique,
  nombre_cat_gab varchar(32) not null
);

create table if not exists examen_gabinete(
  id_servicio int not null primary key,
  id_cat_gab int not null,
  foreign key(id_servicio) references servicio(id_servicio)
    foreign key(id_cat_gab) references categoria_ex_gabinete(id_cat_gab)
);

create table if not exists categoria_servicio_clinico(
  id_cat_cli serial not null primary key,
  codigo_cat_cli varchar(8) unique,
  nombre_cat_cli varchar(32) not null
);

create table if not exists servicio_clinico(
  id_servicio int not null primary key,
  id_cat_cli int not null,
  foreign key (id_servicio) references servicio(id_servicio),
  foreign key (id_cat_cli) references categorio_servicio_clinico(id_cat_cli)
);

create table if not exists orden_examen(
  id_orden serial not null primary key,
  id_historial int not null,
  fecha_orden timestamp not null,
  observacion varchar(128),
  foreign key(id_historial) references historial_paciente(id_historial)
);

create table if not exists detalle_orden_examen(
  id_orden int not null,
  id_servicio int not null,
  estado vsrchar(16),
  primary key(id_orden,id_servicio),
  foreign key (id_orden) references orden_examen(id_orden),
  foreign key (id_servicio) references servicio(id_servicio)
);

create table if not exists solicitud_servicios(
  id_solicitud serial not null primary key,
  id_historial int not null,
  fecha_solicitud timestamp,
  total float,
  foreign key(id_historial) references historial_paciente(id_historial)
);

create table if not exists detalle_solicitud_servicio(
  id_solicitud int not null,
  id_servicio int not null,
  cantidad float not null,
  total_bruto float not null,
  total_neto float not null,
  foreign key (id_solicitud) references solicitud_servicios(id_solicitud),
  foreign key (id_servicio) references servicio(id_servicio)
);
/*
create table if not exists servicio_internacion(
	id_internacion int not null,
	id_servicio int not null,
	fecha_servicio_int timestamp not null,
	cantidad float not null,
	total_bruto float not null,
	total_neto float not null,
	estado_pago varchar(8) not null,
	foreign key (id_internacion) references internacion(id_internacion),
	foreign key (id_servicio) references servicio(id_servicio)
);
*/