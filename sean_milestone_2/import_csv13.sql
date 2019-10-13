load data local infile 'MOCK_DATA(13).csv' into table Happens_At
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (serial_no,dt_start,VIN);

select * from Happens_At;
