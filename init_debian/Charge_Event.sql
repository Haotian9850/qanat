load data local infile '/var/www/html/init/Charge_Event.csv' into table Charge_Event
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (VIN, dt_start, dt_end);

select * from Charge_Event;
