load data local infile 'MOCK_DATA(9).csv' into table Hosts
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (serial_no, station_ID);

select * from Hosts;
