load data local infile '/var/www/html/init/Vehicle.csv' into table Vehicle
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (VIN, make, model, year);

select * from Vehicle;
