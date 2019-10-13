load data local infile 'MOCK_DATA(5).csv' into table User
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (user_id, username);

select * from User;
