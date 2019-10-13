load data local infile 'MOCK_DATA(11).csv' into table Owns
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (VIN,user_id);

select * from Owns;
