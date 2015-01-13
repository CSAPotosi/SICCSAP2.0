insert into unidad(nombre_unidad,descripcion_unidad,estado) values ('GERENCIA','','ACTIVO');
insert into unidad(nombre_unidad,descripcion_unidad,estado) values ('ADMINISTRACION','','ACTIVO');
insert into unidad(nombre_unidad,descripcion_unidad,estado) values ('ENFERMERIA','','ACTIVO');
insert into unidad(nombre_unidad,descripcion_unidad,estado) values ('MEDICOS DE GUARDIA','','ACTIVO');
insert into unidad(nombre_unidad,descripcion_unidad,estado) values ('QUIROFANO','','ACTIVO');
insert into unidad(nombre_unidad,descripcion_unidad,estado) values ('LABORATORIO','','ACTIVO');
insert into unidad(nombre_unidad,descripcion_unidad,estado) values ('FARMACIA','','ACTIVO');
insert into unidad(nombre_unidad,descripcion_unidad,estado) values ('COCINA','','ACTIVO');
insert into unidad(nombre_unidad,descripcion_unidad,estado) values ('LIMPIEZA','','ACTIVO');
insert into unidad(nombre_unidad,descripcion_unidad,estado) values ('PORTERIA','','ACTIVO');
insert into unidad(nombre_unidad,descripcion_unidad,estado) values ('CONSTRUCCION','','ACTIVO');



insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('GERENTE EJECUTIVO','',1,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('GERENTE ADMINISTRATIVO','',1,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('ADMINISTRADOR','',2,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('JEFE MEDICO','',2,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('JEFE DE ENFERMERIA','',2,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('AUXILIAR CONTABLE','',2,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('SECRETARIA','',2,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('AUXILIAR DE ENFERMERIA','',3,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('ENFERMERA DE TURNO','',3,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('MEDICO DE GUARDIA','',4,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('ENCARGADO DE QUIROFANOS','',5,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('LABORATORISTA','',6,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('FARMACEUTICA','',7,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('COCINERA','',8,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('AYUDANTE DE COCINA','',8,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('ENCARGADO DE LIMPIEZA','',9,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('PORTERO','',10,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('CONSTRUCTOR','',11,'ACTIVO');
insert into cargo (nombre_cargo,descripcion_cargo,id_unidad,estado) values ('AYUDANTE DE CONSTRUCCION','',11,'ACTIVO');

insert into horario (nombre_horario,tipo_horario,estado) values ('ADMINISTRACION','NORMAL','ACTIVO');
insert into horario (nombre_horario,tipo_horario,estado) values ('LABORATORIO','NORMAL','ACTIVO');
insert into horario (nombre_horario,tipo_horario,estado) values ('ENFERMERIA','NORMAL','ACTIVO');
insert into horario (nombre_horario,tipo_horario,estado) values ('MEDICOS','NORMAL','ACTIVO');
insert into horario (nombre_horario,tipo_horario,estado) values ('QUIROFANO','NORMAL','ACTIVO');
insert into horario (nombre_horario,tipo_horario,estado) values ('LIMPIEZA','HORAS','ACTIVO');
insert into horario (nombre_horario,tipo_horario,estado) values ('LAVANDERIA','HORAS','ACTIVO');
insert into horario (nombre_horario,tipo_horario,estado) values ('COCINA','NORMAL','ACTIVO');
insert into horario (nombre_horario,tipo_horario,estado) values ('PORTERIA','NORMAL','ACTIVO');
insert into horario (nombre_horario,tipo_horario,estado) values ('FARMACIA','HORAS','ACTIVO');


insert into turno (nombre_turno,tipo_turno,hora_entrada,inicio_entrada,fin_entrada,hora_salida,inicio_salida,fin_salida,tolerancia,dias,id_horario) values ('Administracion mañana','Mañana','08:00',60,40,'12:00',15,60,15,'0111111',1)
insert into turno (nombre_turno,tipo_turno,hora_entrada,inicio_entrada,fin_entrada,hora_salida,inicio_salida,fin_salida,tolerancia,dias,id_horario) values ('Administracion tarde','Tarde','14:00',30,40,'18:00',15,60,15,'0111111',1)
insert into turno (nombre_turno,tipo_turno,hora_entrada,inicio_entrada,fin_entrada,hora_salida,inicio_salida,fin_salida,tolerancia,dias,id_horario) values ('Laboratorio mañana','Mañana','08:00',60,40,'12:00',15,60,15,'1111110',2)
insert into turno (nombre_turno,tipo_turno,hora_entrada,inicio_entrada,fin_entrada,hora_salida,inicio_salida,fin_salida,tolerancia,dias,id_horario) values ('Laboratorio Tarde','tarde','14:30',30,40,'18:30',15,60,15,'0111110',2);
insert into turno (nombre_turno,tipo_turno,hora_entrada,inicio_entrada,fin_entrada,hora_salida,inicio_salida,fin_salida,tolerancia,dias,id_horario) values ('Enfermeria de turno','dia','08:00',60,60,'08:00',60,60,15,'1111111',3);
insert into turno (nombre_turno,tipo_turno,hora_entrada,inicio_entrada,fin_entrada,hora_salida,inicio_salida,fin_salida,tolerancia,dias,id_horario) values ('Medicos de turno','dia','08:00',60,60,'08:00',60,60,15,'1111111',4);
insert into turno (nombre_turno,tipo_turno,hora_entrada,inicio_entrada,fin_entrada,hora_salida,inicio_salida,fin_salida,tolerancia,dias,id_horario) values ('Quirofano mañana','mañana','08:00',60,40,'12:00',15,60,15,'0111111',5);
insert into turno (nombre_turno,tipo_turno,hora_entrada,inicio_entrada,fin_entrada,hora_salida,inicio_salida,fin_salida,tolerancia,dias,id_horario) values ('Quirofano tarde','tarde','14:00',30,40,'18:00',15,60,15,'0111110',5);
insert into turno (nombre_turno,tipo_turno,hora_entrada,inicio_entrada,fin_entrada,hora_salida,inicio_salida,fin_salida,tolerancia,dias,id_horario) values ('Limpieza mañana','mañana','07:00',60,60,'11:00',60,60,0,'1111111',6);
insert into turno (nombre_turno,tipo_turno,hora_entrada,inicio_entrada,fin_entrada,hora_salida,inicio_salida,fin_salida,tolerancia,dias,id_horario) values ('Limpieza tarde','tarde','14:00',30,120,'18:00',60,120,0,'1111111',6);
insert into turno (nombre_turno,tipo_turno,hora_entrada,inicio_entrada,fin_entrada,hora_salida,inicio_salida,fin_salida,tolerancia,dias,id_horario) values ('Lavanderia Mañana','mañana','08:00',60,40,'12:00',15,60,15,'1111111',7);
insert into turno (nombre_turno,tipo_turno,hora_entrada,inicio_entrada,fin_entrada,hora_salida,inicio_salida,fin_salida,tolerancia,dias,id_horario) values ('cocina mañana','mañana','08:00',60,40,'12:00',15,60,15,'1111111',8);
insert into turno (nombre_turno,tipo_turno,hora_entrada,inicio_entrada,fin_entrada,hora_salida,inicio_salida,fin_salida,tolerancia,dias,id_horario) values ('cocina tarde','Tarde','14:00',30,40,'18:00',15,60,15,'1111111',8);
insert into turno (nombre_turno,tipo_turno,hora_entrada,inicio_entrada,fin_entrada,hora_salida,inicio_salida,fin_salida,tolerancia,dias,id_horario) values ('porteria','dia','08:00',60,60,'08:00',60,60,15,'1111111',9);
insert into turno (nombre_turno,tipo_turno,hora_entrada,inicio_entrada,fin_entrada,hora_salida,inicio_salida,fin_salida,tolerancia,dias,id_horario) values ('Farmacia mañana','Mañana','08:00',60,60,'15:30',30,30,0,'1111111',10);
insert into turno (nombre_turno,tipo_turno,hora_entrada,inicio_entrada,fin_entrada,hora_salida,inicio_salida,fin_salida,tolerancia,dias,id_horario) values ('Farmacia tarde','Farmacia','16:01',0,60,'23:59',60,0,0,'1111111',10);


insert into persona (primer_apellido,nombres) values ('persona 1',' persona 1');
insert into persona (primer_apellido,nombres) values ('persona 2',' persona 2');
insert into persona (primer_apellido,nombres) values ('persona 3',' persona 3');
insert into persona (primer_apellido,nombres) values ('persona 4',' persona 4');
insert into persona (primer_apellido,nombres) values ('persona 5',' persona 5');
insert into persona (primer_apellido,nombres) values ('persona 6',' persona 6');
insert into persona (primer_apellido,nombres) values ('persona 7',' persona 7');


insert into empleado (id,fecha_contratacion,estado) values (1,NOW(),'ACTIVO');
insert into empleado (id,fecha_contratacion,estado) values (2,NOW(),'ACTIVO');
insert into empleado (id,fecha_contratacion,estado) values (3,NOW(),'ACTIVO');
insert into empleado (id,fecha_contratacion,estado) values (4,NOW(),'ACTIVO');
insert into empleado (id,fecha_contratacion,estado) values (5,NOW(),'ACTIVO');
insert into empleado (id,fecha_contratacion,estado) values (6,NOW(),'ACTIVO');
insert into empleado (id,fecha_contratacion,estado) values (7,NOW(),'ACTIVO');


insert into asignacion_empleado (fecha_inicio,id_empleado,id_cargo,id_horario) values ('01-01-2014',1,3,1);
insert into asignacion_empleado (fecha_inicio,id_empleado,id_cargo,id_horario) values ('01-01-2014',5,9,3);
insert into asignacion_empleado (fecha_inicio,id_empleado,id_cargo,id_horario) values ('01-01-2014',6,9,3);
insert into asignacion_empleado (fecha_inicio,id_empleado,id_cargo,id_horario) values ('01-01-2014',7,9,3);


