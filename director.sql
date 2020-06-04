create table director(
    id char(9) NOT NULL,
    director varchar(110) NOT NULL,
    primary key (id,director)
);

load data local infile './director1.csv'
into table golden_globe
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 lines;

load data local infile './director2.csv'
into table golden_globe
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 lines;


