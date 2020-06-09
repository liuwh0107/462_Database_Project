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


create table oscar(
    year char(5) NOT NULL,
    nomination varchar(110) NOT NULL,
    film varchar(110) NOT NULL,
    win varchar(10) NOT NULL,
    primary key (year,nomination,film),
    check
    (length(trim(film))>0)
);



load data local infile './female.csv'
into table female
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;

load data local infile './oscar.csv'
into table oscar
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 lines;
delete from oscar where film="";




