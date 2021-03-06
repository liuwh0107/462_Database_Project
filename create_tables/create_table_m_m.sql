create table movie(
    id char(9) not null,
    title varchar(110) not null,
    year char(5),
    primary key (id) 
);

load data local infile './movie.csv'
into table movie
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;

create table movie_detail(
    id char(9) not null,
    duration smallint,
    country varchar(50),
    primary key (id)
);

load data local infile './movie_detail.csv'
into table movie_detail
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;
delete from movie_detail where country="";
