load data local infile 'Plug.csv' into table Plug
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (serial_no, model_no);

select * from Plug;
