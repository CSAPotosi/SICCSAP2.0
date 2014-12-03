//triggers del sistema
//aqui entrar todos los archivos del sistema de base de datos
create or replace function procesar_asistencia() returns trigger as $$
begin
  if exists (select * from asignacion_empleado where id_asignacion=new.id_asignacion) and not exists (select * from registro where id_asignacion=new.id_asignacion and fecha=new.fecha and hora_asistencia=new.hora_asistencia)then
  return new;
  end if;
  return null;
end;
$$
language plpgsql;

CREATE TRIGGER filtrar_repetidos
BEFORE insert ON registro
FOR EACH ROW EXECUTE PROCEDURE procesar_asistencia();