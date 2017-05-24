/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2017/5/24 17:17:28                           */
/*==============================================================*/


drop table if exists Block;

drop table if exists Message;

drop table if exists Topic;

drop table if exists User;

drop table if exists favoriteBlock;

drop table if exists favoriteTopic;

/*==============================================================*/
/* Table: Block                                                 */
/*==============================================================*/
create table Block
(
   BlockId              bigint not null auto_increment,
   BlockName            longtext not null,
   primary key (BlockId)
);

/*==============================================================*/
/* Table: Message                                               */
/*==============================================================*/
create table Message
(
   MsgId                bigint not null auto_increment,
   TopicId              bigint not null,
   UserId               bigint not null,
   MsgContent           varchar(1000) not null,
   MsgTitle             varchar(100) not null,
   MsgTime              datetime not null,
   FLoorNumber          bigint not null,
   primary key (MsgId)
);

/*==============================================================*/
/* Table: Topic                                                 */
/*==============================================================*/
create table Topic
(
   TopicId              bigint not null auto_increment,
   BlockId              bigint not null,
   UserId               bigint not null,
   TopicTitle           varchar(100) not null,
   TopicContent         varchar(1000) not null,
   TopicTime            datetime not null,
   primary key (TopicId)
);

/*==============================================================*/
/* Table: User                                                  */
/*==============================================================*/
create table User
(
   UserId               bigint not null auto_increment,
   Password             varchar(30) not null,
   UserName             varchar(20) not null,
   primary key (UserId)
);

/*==============================================================*/
/* Table: favoriteBlock                                         */
/*==============================================================*/
create table favoriteBlock
(
   UserId               bigint not null,
   BlockId              bigint not null,
   primary key (UserId, BlockId)
);

/*==============================================================*/
/* Table: favoriteTopic                                         */
/*==============================================================*/
create table favoriteTopic
(
   UserId               bigint not null,
   TopicId              bigint not null,
   primary key (UserId, TopicId)
);

alter table Message add constraint FK_Topichave foreign key (TopicId)
      references Topic (TopicId) on delete restrict on update restrict;

alter table Message add constraint FK_publish foreign key (UserId)
      references User (UserId) on delete restrict on update restrict;

alter table Topic add constraint FK_Blockhave foreign key (BlockId)
      references Block (BlockId) on delete restrict on update restrict;

alter table Topic add constraint FK_create foreign key (UserId)
      references User (UserId) on delete restrict on update restrict;

alter table favoriteBlock add constraint FK_be favorited2 foreign key (UserId)
      references User (UserId) on delete restrict on update restrict;

alter table favoriteBlock add constraint FK_favorite2 foreign key (BlockId)
      references Block (BlockId) on delete restrict on update restrict;

alter table favoriteTopic add constraint FK_be favorited foreign key (UserId)
      references User (UserId) on delete restrict on update restrict;

alter table favoriteTopic add constraint FK_favorite foreign key (TopicId)
      references Topic (TopicId) on delete restrict on update restrict;

