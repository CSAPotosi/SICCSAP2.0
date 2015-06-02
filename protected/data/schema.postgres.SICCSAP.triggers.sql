/*create or replace function funcion_filtro() returns trigger as $$
declare
	id_hora int;
	turnos int;
	dia int;
	hora_reg time;
begin
	id_hora:=(select id_horario from asignacion_empleado where id_asignacion=NEW.id_asignacion);
	if id_hora is null then
		return NULL;
	end if;
	dia:=extract(dow from NEW.fecha)+1;
	turnos:=(select id_turno from turno where id_horario=id_hora and substring(dias from dia for 1)='1' and ((NEW.hora_asistencia between (hora_entrada-(inicio_entrada*interval '1 minute')) and (hora_entrada+(   fin_entrada*interval '1 minute'))) or (NEW.hora_asistencia between (hora_salida-(inicio_salida*interval '1 minute')) and (hora_salida+(   fin_salida*interval '1 minute')))) limit 1);
	if(turnos is NULL) then
		return NULL;
	end if;
	
	if exists(select * from turno where id_turno=turnos and NEW.hora_asistencia between (hora_entrada-(inicio_entrada*interval '1 minute')) and (hora_entrada+(   fin_entrada*interval '1 minute'))) then
		NEW.estado=true;
		hora_reg:=(select r.hora_asistencia from registro r ,turno t where t.id_turno=turnos and r.fecha=NEW.fecha and r.hora_asistencia between (t.hora_entrada-(t.inicio_entrada*interval '1 minute')) and (t.hora_entrada+( t.fin_entrada*interval '1 minute')) limit 1);
		if(hora_reg is not null) then
				if ((select hora_reg - hora_entrada from turno where id_turno =turnos limit 1)< (select NEW.hora_asistencia - hora_entrada from turno where id_turno =turnos limit 1)) then
					return NULL;
				else
					delete from registro where fecha=NEW.fecha and hora_asistencia=hora_reg;
					return NEW;
				end if;
		else
			return NEW;
		end if;
	else
		NEW.estado=false;
		hora_reg:=(select r.hora_asistencia from registro r ,turno t where t.id_turno=turnos and r.fecha=NEW.fecha and r.hora_asistencia between (t.hora_salida-(t.inicio_salida*interval '1 minute')) and (t.hora_salida+( t.fin_salida*interval '1 minute')) limit 1);
    --falta considerar tickeo manual
		if(hora_reg is not null) then
				if ((select hora_reg - hora_salida from turno where id_turno =turnos limit 1)> (select NEW.hora_asistencia - hora_salida from turno where id_turno =turnos limit 1)) then
					return NULL;
				else
					delete from registro where fecha=NEW.fecha and hora_asistencia=hora_reg;
					return NEW;
				end if;
		else
			return NEW;
		end if;
	end if;
	return NULL;
end;
$$
language 'plpgsql';

create trigger filtro before insert on registro
for each row execute procedure funcion_filtro();
*/

create or replace function toFirstChars(cadena varchar) returns varchar as $$
declare
	codigo varchar:='';
	item RECORD;
begin
	for item in select regexp_split_to_table(cadena, E'\\s+') as palabra loop
		codigo:=codigo||left(item.palabra,1);
	end loop;
	return upper(codigo);
end;
$$
language 'plpgsql';

create or replace function generarCodigoPersona() returns trigger as $$
declare
	new_codigo varchar:='';
	item RECORD;
	num_reg int;
begin
	new_codigo:=toFirstChars(concat_ws(' ',NEW.primer_apellido,NEW.segundo_apellido,NEW.nombres));
	new_codigo:=to_char(NEW.fecha_nacimiento,'DDMMYY')||'-'||new_codigo||'-';
	num_reg=(select count(*) from persona where codigo like new_codigo||'%')+1;
	NEW.codigo=new_codigo||num_reg;
	return new;
end;
$$
language 'plpgsql';

create trigger trigger_new_persona
before insert or update on persona
for each row execute procedure generarCodigoPersona();


create or replace function actualizarPrecio() returns trigger as $$
declare
  id_servicio int;
begin
  insert into precio_servicio values (NEW.id_servicio,now(),null,NEW.monto);
  NEW.monto=OLD.monto;
  NEW.fecha_fin=now();
  return NEW;
end;
$$
language 'plpgsql';

create trigger trigger_update_precio
  before update on precio_servicio
  for each row when (OLD.monto is distinct from NEW.monto)
execute procedure actualizarPrecio();


