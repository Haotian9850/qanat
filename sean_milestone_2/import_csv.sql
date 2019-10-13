load data local infile 'MOCK_DATA.csv' into table Station
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (station_ID, num_plugs, location);
