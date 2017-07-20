DROP DATABASE IF EXISTS todolist;

CREATE DATABASE todolist;

USE todolist;

CREATE table user (
	id int primary key auto_increment,
    email varchar(255),
    pass varchar(255),
    username varchar(255),
    state int
    
)ENGINE=innodb ;


drop table note;

CREATE table note (
	id int primary key auto_increment,
    user_id int,
    titre varchar(255),
    descrip text
    
)ENGINE=innodb;

alter table note
ADD CONSTRAINT userId
FOREIGN KEY (user_id) REFERENCES user(id);





