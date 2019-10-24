load data local infile 'Station.csv' into table Station
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (station_ID, num_plugs, location);

select * from Station;
