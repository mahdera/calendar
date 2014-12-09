drop database if exists db_event_calendar;
create database db_event_calendar;
use db_event_calendar;

create table tbl_event_calendar(
  id bigint auto_increment,
  title varchar(255) not null,
  body text not null,
  start_time varchar(200) not null,
  end_time varchar(200) not null,
  primary key(id)
);
