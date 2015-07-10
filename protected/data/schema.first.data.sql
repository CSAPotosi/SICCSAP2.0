
--insertar primera persona y usuario
insert into persona (dni, nombres, primer_apellido) values ('3434242','Juan','Perez');
insert into empleado(id) values (1);
insert into usuario( nombre, clave, id_persona) values ('admin',md5('admin'),1);

--insertar institucion
insert into institucion values (DEFAULT ,'CLINICA SANTA ANA S.R.L.','10 DE NOVIEMBRE',2213132);