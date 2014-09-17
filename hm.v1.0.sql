/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     16/07/14 12:25:00                            */
/*==============================================================*/


drop table if exists attention;

drop table if exists authority;

drop table if exists category;

drop table if exists department;

drop table if exists doctor;

drop table if exists event;

drop table if exists first_aid;

drop table if exists general;

drop table if exists interview;

drop table if exists module;

drop table if exists news;

drop table if exists pacient;

drop table if exists service;

drop table if exists speciality;

drop table if exists work_with_us;

/*==============================================================*/
/* Table: attention                                             */
/*==============================================================*/
create table attention
(
   id                   int not null auto_increment,
   pacient_id           int,
   primary key (id)
);

/*==============================================================*/
/* Table: authority                                             */
/*==============================================================*/
create table authority
(
   id                   int not null auto_increment,
   name                 varchar(150) not null,
   email                varchar(150) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: category                                              */
/*==============================================================*/
create table category
(
   id                   int not null auto_increment,
   title                varchar(150) not null,
   description          text not null,
   primary key (id)
);

/*==============================================================*/
/* Table: department                                            */
/*==============================================================*/
create table department
(
   id                   int not null auto_increment,
   name                 varchar(150) not null,
   description          varchar(150) not null,
   picture              varchar(150) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: doctor                                                */
/*==============================================================*/
create table doctor
(
   id                   int not null auto_increment,
   speciality_id        int,
   name                 varchar(250) not null,
   lastname             varchar(150) not null,
   picture              varchar(150) not null,
   title                varchar(255) not null,
   speciality           varchar(255) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: event                                                 */
/*==============================================================*/
create table event
(
   id                   int not null auto_increment,
   title                varchar(150) not null,
   year                 varchar(4) not null,
   topic                varchar(150) not null,
   register_date        datetime not null,
   place                varchar(150) not null,
   picture              varchar(150) not null,
   expositor            varchar(150) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: first_aid                                             */
/*==============================================================*/
create table first_aid
(
   id                   int not null auto_increment,
   title                varchar(150) not null,
   description          text not null,
   picture              varchar(150) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: general                                               */
/*==============================================================*/
create table general
(
   id                   int not null auto_increment,
   title                varchar(150) not null,
   description          text not null,
   multimedia           varchar(150) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: interview                                             */
/*==============================================================*/
create table interview
(
   id                   int not null auto_increment,
   title                varchar(150) not null,
   media                varchar(150) not null,
   registration_date    datetime not null,
   interviewee          varchar(150) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: module                                                */
/*==============================================================*/
create table module
(
   id                   int not null auto_increment,
   service_id           int,
   name                 varchar(150) not null,
   description          text not null,
   picture              varchar(150) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: news                                                  */
/*==============================================================*/
create table news
(
   id                   int not null auto_increment,
   category_id          int,
   picture              varchar(150) not null,
   title                varchar(150) not null,
   description          text not null,
   primary key (id)
);

/*==============================================================*/
/* Table: pacient                                               */
/*==============================================================*/
create table pacient
(
   id                   int not null auto_increment,
   primary key (id)
);

/*==============================================================*/
/* Table: service                                               */
/*==============================================================*/
create table service
(
   id                   int not null auto_increment,
   name                 varchar(150) not null,
   description          text not null,
   primary key (id)
);

/*==============================================================*/
/* Table: speciality                                            */
/*==============================================================*/
create table speciality
(
   id                   int not null auto_increment,
   department_id        int,
   name                 varchar(150) not null,
   description          text not null,
   primary key (id)
);

/*==============================================================*/
/* Table: work_with_us                                          */
/*==============================================================*/
create table work_with_us
(
   id                   int not null auto_increment,
   name                 varchar(150) not null,
   lastname             varchar(150) not null,
   fn                   varchar(150) not null,
   identity             varchar(10) not null,
   phone                varchar(9) not null,
   primary key (id)
);

alter table attention add constraint fk_pacient_attention foreign key (pacient_id)
      references pacient (id) on delete restrict on update restrict;

alter table doctor add constraint fk_speciality_doctor foreign key (speciality_id)
      references speciality (id) on delete restrict on update restrict;

alter table module add constraint fk_service_module foreign key (service_id)
      references service (id) on delete restrict on update restrict;

alter table news add constraint fk_category_news foreign key (category_id)
      references category (id) on delete restrict on update restrict;

alter table speciality add constraint fk_department_speciality foreign key (department_id)
      references department (id) on delete restrict on update restrict;

