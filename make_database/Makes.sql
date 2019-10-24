load data local infile 'Makes.csv' into table Makes
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (review_id,user_id);

select * from Makes;
