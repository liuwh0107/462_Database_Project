create table movie(
    id char(9) not null,
    title varchar(110) not null,
    year char(5),
    primary key (id) 
);

create table movie_detail(
    id char(9) not null,
    duration smallint,
    country varchar(50),
    primary key (id)
);

create table director(
    id char(9) NOT NULL,
    director varchar(110) NOT NULL,
    primary key (id,director)
);

create table genre(
    id char(9) not null,
    genre varchar(15) not null,
    primary key (id,genre) 
);

create table all_gender(
    id char(9) not null,
    votes int not null,
    rating float not null,
    avg_0_18 float not null,
    num_0_18 int not null,
    avg_18_30 float not null,
    num_18_30 int not null,
    avg_30_45 float not null,
    num_30_45 int not null,
    avg_45up float not null,
    num_45up int not null,
    primary key (id)
);

create table male (
    id char(9) not null,
    rating float not null,
    votes int not null,
    avg_0_18 float not null,
    num_0_18 int not null,
    avg_18_30 float not null,
    num_18_30 int not null,
    avg_30_45 float not null,
    num_30_45 int not null,
    avg_45up float not null,
    num_45up int not null,
    primary key (id)
);

create table female(
    id char(9) NOT NULL,
    rating float NOT NULL,
    votes int NOT NULL,
    avg_0_18 float NOt NULL,
    num_0_18 int NOT NULL,
    avg_18_30 float NOT NULL,
    num_18_30 int NOT NULL,
    avg_30_45 float NOT NULL,
    num_30_45 int NOT NULL,
    avg_45up float NOT NULL,
    num_45up int NOT NULL,
    primary key (id)
);

create table golden_globe(
    year char(5) NOT NULL,
    nomination varchar(110) NOT NULL,
    film varchar(110) NOT NULL,
    win varchar(10) NOT NULL,
    primary key (year,nomination,film)
);

create table oscar(
    year char(5) NOT NULL,
    nomination varchar(110) NOT NULL,
    film varchar(110) NOT NULL,
    win varchar(10) NOT NULL,
    primary key (year,nomination,film),
    check
    (length(trim(film))>0)
);

load data local infile './movie.csv'
into table movie
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;

load data local infile './movie_detail.csv'
into table movie_detail
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;
delete from movie_detail where country="";

load data local infile './director1.csv'
into table director
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 lines;

load data local infile './director2.csv'
into table director
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 lines;
delete from director where director='';

load data local infile './genre1.csv'
into table genre
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 lines;

load data local infile './genre2.csv'
into table genre
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 lines;

load data local infile './genre3.csv'
into table genre
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 lines;
delete from genre where genre.genre = "";

load data local infile './all_gender.csv'
into table all_gender
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 lines;

load data local infile './male.csv'
into table male
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 lines;

load data local infile './female.csv'
into table female
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;

load data local infile './golden_globe.csv'
into table golden_globe
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 lines;
delete from golden_globe where film='';

load data local infile './oscar.csv'
into table oscar
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 lines;
delete from oscar where film="";
