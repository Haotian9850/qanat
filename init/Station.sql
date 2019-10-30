load data local infile '/var/www/html/init/Station.csv' into table Station
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (station_ID, num_plugs, location);

select * from Station;
