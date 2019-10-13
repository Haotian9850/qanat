load data local infile 'MOCK_DATA(10).csv' into table Supports
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (model_no,make,model,year);

select * from Supports;
