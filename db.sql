/* Created on:     Yiru's Macbook Pro 2017/5/24 23:50:43       	*/ 
/*==============================================================*/

drop trigger  if exists updateMsgtime;

drop trigger  if exists insertMsgtime;

drop trigger  if exists updateTopictime;

drop trigger  if exists insertTopictime;

drop trigger if exists addMsgFloor;

drop view if exists UserFavoriteTopic;

drop procedure if exists changeMsgContent;

drop procedure if exists changeTopicContent;

drop table if exists favoriteBlock;

drop table if exists favoriteTopic;

drop table if exists Message;

drop table if exists Topic;

drop table if exists Block;

drop table if exists User;

set @@sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';

/*==============================================================*/
/* Table: Block                                                 */
/*==============================================================*/
create table Block
(
   BlockId              bigint not null auto_increment,
   BlockName            varchar(100) not null,
   BlockIntro           varchar(2000),
   primary key (BlockId),
   unique(BlockName)
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
   MsgTime              datetime,
   FLoorNumber          bigint,
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
   TopicTime            datetime,
   primary key (TopicId),
   unique(TopicTitle) 
);

/*==============================================================*/
/* Table: User                                                  */
/*==============================================================*/
create table User
(
   UserId               bigint not null auto_increment,
   Password             varchar(1000) not null,
   UserName             varchar(20) not null,
   primary key (UserId),
   unique(UserName)
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

alter table favoriteBlock add constraint FK_favorite2 foreign key (BlockId)
      references Block (BlockId) on delete restrict on update restrict;

alter table favoriteBlock add constraint FK_favorited2 foreign key (UserId)
      references User (UserId) on delete restrict on update restrict;

alter table favoriteTopic add constraint FK_favorite foreign key (TopicId)
      references Topic (TopicId) on delete restrict on update restrict;

alter table favoriteTopic add constraint FK_favorited foreign key (UserId)
      references User (UserId) on delete restrict on update restrict;

create unique index User_Id on User(UserId);
create unique index Msg_Id on Message(MsgId);
create unique index Topic_Id on Topic(TopicId);
create unique index Block_Id on Block(BlockId);


delimiter ||
create trigger updateMsgtime before update
on Message for each row
begin
    set new.Msgtime= current_timestamp;
end||

create trigger insertMsgtime before insert
on Message for each row
begin
    set new.Msgtime= current_timestamp;
end||

create trigger updateTopictime before update
on Topic for each row
begin
    set new.Topictime=current_timestamp;
end||

create trigger insertTopictime before insert
on Topic for each row
begin
    set new.Topictime=current_timestamp;
end||

create trigger addMsgFloor before insert
on Message for each row
begin 
    set new.FloorNumber = (select count(*) from Message where TopicId = new.TopicId) + 1 ;
end||

create procedure changeMsgContent(
	in Id bigint,
	in Content varchar(1000)
)
begin
	update Message
	set MsgContent = Content
	where MsgId = Id; 
end||

create procedure changeTopicContent(
	in Id bigint,
	in Content varchar(1000)
)
begin
	update Topic
	set TopicContent = Content
	where TopicId = Id; 
end||

delimiter ;

create view UserFavoriteTopic(UserId, TopicId, BlockName, TopicTitle, TopicContent)
as
(
	select favoriteTopic.UserId, favoriteTopic.TopicId , Block.BlockName, TopicTitle, TopicContent
	from  favoriteTopic, Topic, Block
	where  favoriteTopic.TopicId =Topic.TopicId
	and TopicTitle = Topic.TopicTitle 
	and TopicContent = Topic.TopicContent
	and Block.BlockId = Topic.BlockId 
)
order by UserId asc;
