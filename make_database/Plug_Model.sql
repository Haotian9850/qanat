load data local infile 'Plug_Model.csv' into table Plug_Model
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (model_no, charge_speed);

select * from Plug_Model;
