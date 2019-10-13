load data local infile 'MOCK_DATA(1).csv' into table Plug_Model
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (model_no, charge_speed);

select * from Plug_Model;
