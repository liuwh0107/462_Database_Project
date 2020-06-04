load data local infile './movie.csv'
into table movie
fields terminated by ','
enclosed by '"'
lines terminated by '\r\n'
ignore 1 lines;
