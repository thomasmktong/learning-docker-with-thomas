use exampleapp;

create table Messages (message varchar(255) not null);
insert into Messages (message) values ('Thanks good sir. I am feeling quite healthy!');
insert into Messages (message) values ('Thanks for the meal buddy.');
insert into Messages (message) values ('Please stop feeding me. I am getting huge!');

create table Feed (counter int not null);
insert into Feed(counter) values (0);