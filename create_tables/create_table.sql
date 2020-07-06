/*create 5 tables*/
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

load data local infile './male.csv'
into table male
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 rows;


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

load data local infile './all_gender.csv'
into table all_gender
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 rows;


