load data local infile 'Car_Type.csv' into table Car_Type
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (make, model, year);

select * from Car_Type;
