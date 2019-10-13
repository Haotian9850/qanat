load data local infile 'Happens_At.csv' into table Happens_At
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (serial_no,dt_start,VIN);

select * from Happens_At;
