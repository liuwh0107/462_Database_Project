create table golden_globe(
    year char(5) NOT NULL,
    nomination varchar(110) NOT NULL,
    film varchar(110) NOT NULL,
    win varchar(10) NOT NULL,
    primary key (year,nomination,film)
);

load data local infile './golden_globe.csv'
into table golden_globe
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 lines;



