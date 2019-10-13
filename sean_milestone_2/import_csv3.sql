load data local infile 'MOCK_DATA(3).csv' into table Car_Type
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (make, model, year);

select * from Car_Type;
