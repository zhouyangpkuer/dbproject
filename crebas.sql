/*==============================================================*/
/* DBMS name:      Sybase SQL Anywhere 12                       */
/* Created on:     2017/5/23 20:35:04                           */
/*==============================================================*/


if exists(select 1 from sys.sysforeignkey where role='FK_MESSAGE_TOPICHAVE_TOPIC') then
    alter table "Message"
       delete foreign key FK_MESSAGE_TOPICHAVE_TOPIC
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_MESSAGE_PUBLISH_USER') then
    alter table "Message"
       delete foreign key FK_MESSAGE_PUBLISH_USER
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_TOPIC_BLOCKHAVE_BLOCK') then
    alter table Topic
       delete foreign key FK_TOPIC_BLOCKHAVE_BLOCK
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_TOPIC_CREATE_USER') then
    alter table Topic
       delete foreign key FK_TOPIC_CREATE_USER
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_FAVORITE_BE FAVORI_USER') then
    alter table favoriteBlock
       delete foreign key "FK_FAVORITE_BE FAVORI_USER"
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_FAVORITE_FAVORITE2_BLOCK') then
    alter table favoriteBlock
       delete foreign key FK_FAVORITE_FAVORITE2_BLOCK
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_FAVORITE_BE FAVORI_USER') then
    alter table favoriteTopic
       delete foreign key "FK_FAVORITE_BE FAVORI_USER"
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_FAVORITE_FAVORITE_TOPIC') then
    alter table favoriteTopic
       delete foreign key FK_FAVORITE_FAVORITE_TOPIC
end if;

drop index if exists Block.Block_PK;

drop table if exists Block;

drop index if exists "Message".Topichave_FK;

drop index if exists "Message".publish_FK;

drop index if exists "Message".Message_PK;

drop table if exists "Message";

drop index if exists Topic.Blockhave_FK;

drop index if exists Topic.create_FK;

drop index if exists Topic.Topic_PK;

drop table if exists Topic;

drop index if exists "User".User_PK;

drop table if exists "User";

drop index if exists favoriteBlock.favorite2_FK;

drop index if exists favoriteBlock."be favorited2_FK";

drop index if exists favoriteBlock.favoriteBlock_PK;

drop table if exists favoriteBlock;

drop index if exists favoriteTopic.favorite_FK;

drop index if exists favoriteTopic."be favorited_FK";

drop index if exists favoriteTopic.favoriteTopic_PK;

drop table if exists favoriteTopic;

/*==============================================================*/
/* Table: Block                                                 */
/*==============================================================*/
create table Block 
(
   BlockId              integer                        not null,
   BlockName            long varchar                   not null,
   constraint PK_BLOCK primary key (BlockId)
);

/*==============================================================*/
/* Index: Block_PK                                              */
/*==============================================================*/
create unique index Block_PK on Block (
BlockId ASC
);

/*==============================================================*/
/* Table: "Message"                                             */
/*==============================================================*/
create table "Message" 
(
   MsgId                integer                        not null,
   TopicId              integer                        null,
   UserId               integer                        null,
   MsgContent           varchar(1000)                  not null,
   MsgTitle             varchar(100)                   not null,
   MsgTime              timestamp                      not null,
   FLoorNumber          integer                        not null,
   constraint PK_MESSAGE primary key (MsgId)
);

/*==============================================================*/
/* Index: Message_PK                                            */
/*==============================================================*/
create unique index Message_PK on "Message" (
MsgId ASC
);

/*==============================================================*/
/* Index: publish_FK                                            */
/*==============================================================*/
create index publish_FK on "Message" (
UserId ASC
);

/*==============================================================*/
/* Index: Topichave_FK                                          */
/*==============================================================*/
create index Topichave_FK on "Message" (
TopicId ASC
);

/*==============================================================*/
/* Table: Topic                                                 */
/*==============================================================*/
create table Topic 
(
   TopicId              integer                        not null,
   BlockId              integer                        null,
   UserId               integer                        null,
   TopicTitle           varchar(100)                   not null,
   TopicContent         varchar(1000)                  not null,
   TopicTime            timestamp                      not null,
   constraint PK_TOPIC primary key (TopicId)
);

/*==============================================================*/
/* Index: Topic_PK                                              */
/*==============================================================*/
create unique index Topic_PK on Topic (
TopicId ASC
);

/*==============================================================*/
/* Index: create_FK                                             */
/*==============================================================*/
create index create_FK on Topic (
UserId ASC
);

/*==============================================================*/
/* Index: Blockhave_FK                                          */
/*==============================================================*/
create index Blockhave_FK on Topic (
BlockId ASC
);

/*==============================================================*/
/* Table: "User"                                                */
/*==============================================================*/
create table "User" 
(
   UserId               integer                        not null,
   UserName             varchar(20)                    not null,
   Password             varchar(30)                    not null,
   Email                varchar(30)                    not null,
   constraint PK_USER primary key (UserId)
);

/*==============================================================*/
/* Index: User_PK                                               */
/*==============================================================*/
create unique index User_PK on "User" (
UserId ASC
);

/*==============================================================*/
/* Table: favoriteBlock                                         */
/*==============================================================*/
create table favoriteBlock 
(
   UserId               integer                        not null,
   BlockId              integer                        not null,
   constraint PK_FAVORITEBLOCK primary key clustered (UserId, BlockId)
);

/*==============================================================*/
/* Index: favoriteBlock_PK                                      */
/*==============================================================*/
create unique clustered index favoriteBlock_PK on favoriteBlock (
UserId ASC,
BlockId ASC
);

/*==============================================================*/
/* Index: "be favorited2_FK"                                    */
/*==============================================================*/
create index "be favorited2_FK" on favoriteBlock (
UserId ASC
);

/*==============================================================*/
/* Index: favorite2_FK                                          */
/*==============================================================*/
create index favorite2_FK on favoriteBlock (
BlockId ASC
);

/*==============================================================*/
/* Table: favoriteTopic                                         */
/*==============================================================*/
create table favoriteTopic 
(
   UserId               integer                        not null,
   TopicId              integer                        not null,
   constraint PK_FAVORITETOPIC primary key clustered (UserId, TopicId)
);

/*==============================================================*/
/* Index: favoriteTopic_PK                                      */
/*==============================================================*/
create unique clustered index favoriteTopic_PK on favoriteTopic (
UserId ASC,
TopicId ASC
);

/*==============================================================*/
/* Index: "be favorited_FK"                                     */
/*==============================================================*/
create index "be favorited_FK" on favoriteTopic (
UserId ASC
);

/*==============================================================*/
/* Index: favorite_FK                                           */
/*==============================================================*/
create index favorite_FK on favoriteTopic (
TopicId ASC
);

alter table "Message"
   add constraint FK_MESSAGE_TOPICHAVE_TOPIC foreign key (TopicId)
      references Topic (TopicId)
      on update restrict
      on delete restrict;

alter table "Message"
   add constraint FK_MESSAGE_PUBLISH_USER foreign key (UserId)
      references "User" (UserId)
      on update restrict
      on delete restrict;

alter table Topic
   add constraint FK_TOPIC_BLOCKHAVE_BLOCK foreign key (BlockId)
      references Block (BlockId)
      on update restrict
      on delete restrict;

alter table Topic
   add constraint FK_TOPIC_CREATE_USER foreign key (UserId)
      references "User" (UserId)
      on update restrict
      on delete restrict;

alter table favoriteBlock
   add constraint "FK_FAVORITE_BE FAVORI_USER" foreign key (UserId)
      references "User" (UserId)
      on update restrict
      on delete restrict;

alter table favoriteBlock
   add constraint FK_FAVORITE_FAVORITE2_BLOCK foreign key (BlockId)
      references Block (BlockId)
      on update restrict
      on delete restrict;

alter table favoriteTopic
   add constraint "FK_FAVORITE_BE FAVORI_USER" foreign key (UserId)
      references "User" (UserId)
      on update restrict
      on delete restrict;

alter table favoriteTopic
   add constraint FK_FAVORITE_FAVORITE_TOPIC foreign key (TopicId)
      references Topic (TopicId)
      on update restrict
      on delete restrict;

