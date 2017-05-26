


insert into Block(BlockId, BlockName) values(null, "Sigcomm");

insert into Block(BlockId, BlockName) values(null, "Sigmod");

insert into Block(BlockId, BlockName) values(null, "NSDI");

insert into Block(BlockId, BlockName) values(null, "VLDB");




insert into Topic(TopicId, BlockId, UserId, TopicTitle, TopicContent, TopicTime) values(null, 1, 1, "Trumpet: Timely and Precise 
Triggers in Data Centers", "This paper is unclear, and I cannot understand it", '2008-08-08 22:20:46');

insert into Topic(TopicId, BlockId, UserId, TopicTitle, TopicContent, TopicTime) values(null, 1, 1, "One Sketch to Rule Them All: Rethinking Network Flow Monitoring with UnivMon", "Cannot recover its experiments", '2010-08-09 22:20:46');

insert into Topic(TopicId, BlockId, UserId, TopicTitle, TopicContent, TopicTime) values(null, 2, 1, "Augmented Sketch: Faster and More Accurate Stream Processing", "Idea is easy, but the experimental result is good!", '2011-09-09 22:20:46');

insert into Topic(TopicId, BlockId, UserId, TopicTitle, TopicContent, TopicTime) values(null, 4, 1, "Pyramid Sketch: a Sketch Framework for Frequency Estimation of Data Streams", "My God, this paper costs me a whole spring festival", '2014-10-09 22:20:46');




insert into Message(MsgId, TopicId, UserId, MsgContent, MsgTitle, MsgTime, FLoorNumber) values(null, 1, 1, "Because you are too naive~~", "hahaha", '2011-10-09 22:20:46', 1);  



insert into favoriteBlock(UserId, BlockId) values(1, 1);

insert into favoriteBlock(UserId, BlockId) values(1, 2);



insert into favoriteTopic(UserId, TopicId) values(1, 2);


insert into favoriteTopic(UserId, TopicId) values(1, 4);