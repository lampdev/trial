drop table if exists `teams`;
create table `teams`
(
    `id` int not null auto_increment,
    `name` varchar(64) not null, 
    `description` varchar(1024) default null, 
    `rating` float(3,2), 
    `image_id` int default null,
    primary key(`id`)
) DEFAULT CHARSET=utf8;

drop table if exists `teamMembers`;
create table `teamMembers`
(
    `id` int not null auto_increment,
    `team_id` int not null, 
    `name` varchar(64) not null, 
    `description` varchar(1024) default null, 
    `years_exp_fe` smallint default null, 
    `years_exp_be` smallint default null, 
    `years_exp_db` smallint default null, 
    `years_exp_sys` smallint default null, 
    `github_url` varchar(128) default null, 
    `image_id` int default null,
    primary key(`id`)
) DEFAULT CHARSET=utf8;

drop table if exists `images`;
create table `images`
(
    `id` int not null auto_increment, 
    `name` varchar(64) not null, 
    `url` varchar(1024) not null,
    primary key(`id`)
) DEFAULT CHARSET=utf8;

insert into `images`(`name`,`url`) values
('image 1','http://markdionsbartramstravels.com/wp-content/uploads/2013/01/Indian-trains-1.jpg'),
('image 2','http://nangluongvietnam.vn/stores/news_dataimages/Tongbientap/102014/03/20/20101116045533496.jpg'),
('image 3','http://3.bp.blogspot.com/-3MU8QXZe4Ck/ThVRUX896oI/AAAAAAAAA2g/qpeC-ehM4Z8/s320/trainindia7.jpg'),
('image 4','https://yatinpatel.files.wordpress.com/2012/05/indiacrowdedtrain.jpg'),
('image 5','http://thinkjayant.com/wp-content/uploads/2012/12/india-railway-passenger.jpg'),
('image 6','http://33.media.tumblr.com/8dfc893edc5e5e3d71949f2b94e19725/tumblr_nc5l80merq1rllgflo1_500.jpg'),
('image 7','http://gazetadecluj.ro/wp-content/uploads/2014/11/tren-plin.jpg'),
('image 8','http://planetark.org/images/wefull/58852.jpg'),
('image 9','http://www.quickmeme.com/img/4a/4a5671f062cd659b586511f919f69dac0e5cf2a39465120f1c9284effa6492fd.jpg'),
('image 10','http://www.quickmeme.com/img/8a/8adc5ce80bdf8ae243396182644e0edab2e8e61efcb0fcb77f584b0509f35e7a.jpg'),
('image 11','http://www.quickmeme.com/img/2e/2edc7fa029c89a0fa7f238158e0619f828cff44be9a29c640c6dcd1864bd27d0.jpg');