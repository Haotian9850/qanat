load data local infile '/var/www/html/init/User.csv' into table User
 fields terminated by ','
 enclosed by '\''
 lines terminated by '\n'
 (user_id, username, hash);

select * from User;
