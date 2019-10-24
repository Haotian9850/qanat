load data local infile 'Owns.csv' into table Owns
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (VIN,user_id);

select * from Owns;
