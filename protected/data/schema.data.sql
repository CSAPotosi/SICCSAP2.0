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

insert into persona(nombres,primer_apellido,segundo_apellido) values
  ('GUILLERMO OSCAR','AZURDUY',''),
  ('JULIO CESAR','',''),
  ('XIMENA','ARPAT',''),
  ('LUIS','BENITEZ','ROJAS'),
  ('KUSKAYA','ROSSO',''),
  ('JHOJAIRA','ROSSO',''),
  ('DAYSI','FLORES','ARANA'),
  ('NEYDA M.','CUEVAS','GOYTIA'),
  ('LIZBETH','GALARZA',''),
  ('OLGA','VELIZ','CONDORI'),
  ('MARLENE','CALLAPA',''),
  ('NORKA','TICONA','SARATE'),
  ('ROSMERY','GUTIERREZ',''),
  ('LUZ','MAYTA',''),
  ('ROXANA','VILLANUEVA',''),
  ('SCARLET','CARDOZO',''),
  ('LEYDI','MARTINEZ','BARRIOS'),
  ('RONNY','MORUNO',''),
  ('SANDRA','LLANOS',''),
  ('XIMENA','VALVERDE',''),
  ('LILIANA','SILEZ',''),
  ('MARLENE','MENACHO','PARRA'),
  ('LUCILA','CONDEX',''),
  ('KENNY','CEBALLOS',''),
  ('ROGER MIRCO','RODRIGUEZ',''),
  ('RENE','ROSSO',''),
  ('KARINA','GENOVEVA',''),
  ('ANA','',''),
  ('EDWIN','SANCHEZ','');

insert into empleado (id) values
  (1),(2),(3),(4),(5),(6),(7),(8),
  (9),(10),(11),(12),(13),(14),(15),(16),
  (17),(18),(19),(20),(21),(22),(23),(24),
  (25),(26),(27),(28),(29);

insert into asignacion_empleado (fecha_inicio,id_empleado,id_cargo,id_horario) values
  ('01-01-2014',1,4,1),('01-01-2014',2,6,1),('01-01-2014',3,7,1),('01-01-2014',4,3,1),
  ('01-01-2014',5,14,8),('01-01-2014',6,15,8),('01-01-2014',7,11,5),('01-01-2014',8,9,3),
  ('01-01-2014',9,?,?),('01-01-2014',10,?,?),('01-01-2014',11,?,?),('01-01-2014',12,?,?),
  ('01-01-2014',13,?,?),('01-01-2014',14,?,?),('01-01-2014',15,?,?),('01-01-2014',16,?,?),
  ('01-01-2014',17,?,?),('01-01-2014',18,?,?),('01-01-2014',19,?,?),('01-01-2014',20,?,?),
  ('01-01-2014',21,16,6),('01-01-2014',22,16,7),('01-01-2014',23,16,6),('01-01-2014',24,10,4),
  ('01-01-2014',25,10,4),('01-01-2014',26,17,9),('01-01-2014',27,?,?),('01-01-2014',28,?,?),
  ('01-01-2014',29,10,4);



insert into usuario ( nombre, clave, id_persona) values ('admin',md5('admin'),1);

insert into signos_vitales (nombre_sv,nombre_corto_sv,unidad_sv) values ('presion arterial sistole','Pre. Art.','Sist.'),
  ('presion arterial diastole','Pre. Art.','Diast.'),
  ('pulsaciones','Puls.','ppm'),
  ('ritmo respiratorio','ritmo resp.','rpm'),
  ('temperatura','temp.','º Grados'),
  ('altura','alt.','cm'),
  ('peso','peso','Kgs.'),
  ('Indice de masa corporal','IMC','kg/m^2');