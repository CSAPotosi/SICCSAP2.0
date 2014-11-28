//triggers del sistema
//aqui entrar todos los archivos del sistema de base de datos
create or replace function pseudo_fk_historial_costos() returns trigger as $$
begin
    if not exists(select * from servicio where id_servicio = new.id_servicio and tipo_servicio = new.tipo_servicio) then
        raise exception 'No existe servicio con id: %', new.id_servicio;
        return null;
    end if;
    return new;
end;
$$
language plpgsql;

drop trigger system_llave_foranea_historial_costos on historial_costo;
CREATE TRIGGER system_llave_foranea_historial_costos
BEFORE insert ON historial_costo
FOR EACH ROW EXECUTE PROCEDURE pseudo_fk_historial_costos();



//triggers de control de costos
create or replace function actualizar_costos()
returns trigger as $$
begin
  if NEW.monto <> OLD.monto then
    update historial_costo set fecha_fin=NOW() where id_historial_costo=NEW.id_historial_costo;
    insert into historial_costo (fecha_inicio,monto,id_servicio,tipo_servicio) values(NOW(),NEW.monto,NEW.id_servicio,NEW.tipo_servicio);
    return NULL;
  end if;
  return NEW;
end;
$$
language plpgsql;


drop trigger trigger_costo on historial_costo;
CREATE TRIGGER trigger_costo
BEFORE UPDATE ON historial_costo
    FOR EACH ROW EXECUTE PROCEDURE actualizar_costos();








CREATE TABLE especialidad(
  id_especialidad SERIAL primary key not null,
  nombre_especialidad  varchar(50) not null,
  descripcion varchar(128)
);

create table medico(
  id_medico serial not null primary key ,
  matricula varchar(20),
  colegiatura varchar(50),
  estado varchar(15),
  motivo_cambio_estado varchar(128)
)inherits (persona);

create table medico_especialidad(
  id_medico int,
  id_especialidad int,
  foreign key (id_medico)references medico(id_medico),
  foreign key(id_especialidad) references especialidad(id_especialidad)
);
create table departamento(
  id_departamento SERIAL not null PRIMARY KEY,
  nombre varchar(50),
  ubicacion varchar(100),
  piso varchar(50)
);
create table empresa(
  id_empresa serial not null primary key,
  nit_empresa int,
  nombre_empresa varchar(128),
  ubicacion_empresa varchar(128),
  telefono varchar(15)
);

create table paciente(
  id_paciente serial not null primary key,
  ocupacion varchar(50),
  grupo_sanguineo varchar(5),
  nombre_responsable varchar(256),
  direccion_responsable varchar(128),
  telefono_responsable varchar(20),
  relacion_responsable_paciente varchar(20),
  tipo_paciente varchar(20),
  estado_paciente varchar(15),
  fecha_muerte timestamp,
  id_empresa int,
  foreign key (id_empresa) references empresa(id_empresa)
)inherits (persona);



create table historial_medico(
  id_historial serial primary key,
  id_paciente int,
  fecha_creacion timestamp,
  fecha_actualizacion timestamp,
  foreign key (id_paciente) references paciente (id_paciente)
);

create table historial_consulta(
  id_historial_consulta serial primary key,
  fecha_consulta timestamp,
  id_historial int,
  foreign key (id_historial) references historial_medico(id_historial)
);
create table diagnostico_consulta(
  id_diagnostico serial primary key,
  enfermedad text,
  tratamiento text,
  observaciones text,
  ritmo_cardiaco varchar(50),
  frecuencia_respiratoria varchar(50),
  temperatura varchar(50),
  precion_arterial varchar(50),
  peso varchar(10),
  talla varchar(10),
  id_historial_consulta int,
  foreign key (id_historial_consulta) references historial_consulta(id_historial_consulta)
);

create table receta(
  id_receta serial primary key,
  nombre varchar(100),
  cantidad int,
  tratamiento varchar(200),
  id_diagnostico int,
  foreign key (id_diagnostico) references diagnostico_consulta(id_diagnostico)
);
create table reconsulta(
  id_reconsulta serial primary key,
  fecha_reconsulta timestamp,
  evolucion varchar(200),
  observaciones varchar(200),
  id_historial_consulta int,
  foreign key (id_historial_consulta) references historial_consulta(id_historial_consulta)
);

create table programacion_cita(
  id_programacion_cita serial primary key,
  fecha_de_registro timestamp,
  fecha date,
  hora time,
  id_paciente int,
  id_medico int,
  foreign key (id_medico) references medico(id_medico),
  foreign key (id_paciente) references paciente(id_paciente)
);


create table solicitud_orden(
  id_orden serial primary key,
  nombre varchar(50),
  id_historial int,
  foreign key (id_historial) references historial_medico(id_historial)
)inherits (servicio);

/*Fin oso*/


/*Pika */

create table internacion(
  id_internacion serial not null primary key,
  fecha_admision timestamp ,
  motivo_ingreso varchar(25),
  fecha_egreso timestamp ,
  motivo_egreso varchar(25),/*alta solicitada, fuga */
  id_historial int,
  foreign key (id_historial) references historial_medico(id_historial)
);

create table evolucion_clinica(
  id_evolucion_clinica serial not null primary key,
  fecha_revision timestamp ,
  estado_paciente varchar(25),
  observaciones text ,
  recomendaciones text ,
  id_internacion int,
  foreign key (id_internacion) references internacion(id_internacion)
);

create table quirofano(
  id_quirofano serial not null primary key,
  nombre_quirofano varchar(30),
  descripcion_quirofano varchar(128)
);

create table cirugia(
  id_cirugia serial not null primary key ,
  fecha_inicio timestamp ,
  fecha_fin timestamp ,
  id_quirofano int,
  id_historial int,
  id_internacion int,
  foreign key (id_quirofano) references quirofano(id_quirofano),
  foreign key (id_historial) references historial_medico(id_historial),
  foreign key (id_internacion) references internacion(id_internacion)
);

create table diagnostico_internacion(
  id_diagnostico serial not null primary key ,
  fecha_diagnostico timestamp ,
  evaluacion_medica text
);

create table cie10(
  codigo_cie10 varchar (10) primary key ,
  titulo_cie10 varchar (256),
  descripcion_cie10 text ,
  codigo_padre varchar(10)
);

create table diagnostico_internacion_cie10(
  id_diagnostico int,
  codigo_cie10 varchar(10),
  foreign key (id_diagnostico) references diagnostico_internacion(id_diagnostico),
  foreign key (codigo_cie10) references cie10(codigo_cie10)
);

create table servicio(
  id_servicio int,
  tipo_servicio varchar(20),
  fecha_creacion_servicio date,
  fecha_modificacion_servicio date
);

create table historial_costo(
  id_historial_costo SERIAL NOT NULL primary key ,
  fecha_inicio date not null ,
  fecha_fin date,
  monto float not null,
  id_servicio int,
  tipo_servicio varchar(20)
);

create table tipo_sala(
  id_servicio serial primary key,
  nombre_tipo_sala varchar(50) not null,
  descripcion_tipo_sala varchar(128)
)inherits (servicio);

create table sala(
  id_sala SERIAL not null primary key,
  numero_sala int,
  ubicacion_sala varchar(128),
  estado_sala varchar(15),
  id_servicio int,
  foreign key (id_servicio) references tipo_sala(id_servicio)
);

create table categoria_servicio(
  id_categoria_servicio serial not null primary key,
  titulo_categoria_servicio varchar(128),
  descripcion_categoria_servicio text
);

create table detalle_servicio(
  id_servicio serial primary key,
  titulo_detalle varchar(128),
  descripcion_detalle text,
  id_categoria_servicio int,
  foreign key (id_categoria_servicio) references categoria_servicio(id_categoria_servicio)
)inherits (servicio);

create table examen_laboratorio(
  id_servicio serial primary key ,
  nombre_examen varchar(128),
  descripcion_examen text
)inherits (servicio);


/*Fin */








