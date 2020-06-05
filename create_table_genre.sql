create table genre(
    id char(9) not null,
    genre varchar(15) not null,
    primary key (id,genre) 
);

load data local infile './genre1.csv'
into table genre
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 lines;
delete from genre where genre.genre = "";

load data local infile './genre2.csv'
into table genre
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 lines;
delete from genre where genre.genre = "";

load data local infile './genre3.csv'
into table genre
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 lines;
delete from genre where genre.genre = "";
