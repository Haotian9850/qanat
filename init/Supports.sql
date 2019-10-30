load data local infile '/var/www/html/init/Supports.csv' into table Supports
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (model_no,make,model,year);

select * from Supports;
