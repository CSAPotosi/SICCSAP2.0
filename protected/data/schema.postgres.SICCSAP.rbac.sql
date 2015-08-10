/**
 * Database schema required by CDbAuthManager.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * @since 1.0
 */

drop table if exists "subrol";
drop table if exists "asignacion_rol";
drop table if exists "rol";

create table rol
(
  "name"                 varchar(64) not null,
  "type"                 integer not null,
  "description"          text,
  "bizrule"              text,
  "data"                 text,
  primary key ("name")
);

create table subrol
(
  "parent"               varchar(64) not null,
  "child"                varchar(64) not null,
  primary key ("parent","child"),
  foreign key ("parent") references "rol" ("name") on delete cascade on update cascade,
  foreign key ("child") references "rol" ("name") on delete cascade on update cascade
);

create table asignacion_rol
(
  "itemname"             varchar(64) not null,
  "userid"               varchar(64) not null,
  "bizrule"              text,
  "data"                 text,
  primary key ("itemname","userid"),
  foreign key ("itemname") references "rol" ("name") on delete cascade on update cascade
);
