load data local infile '/var/www/html/init/Happens_At.csv' into table Happens_At
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (serial_no,dt_start,VIN);

select * from Happens_At;
