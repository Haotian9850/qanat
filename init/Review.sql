load data local infile '/var/www/html/init/Review.csv' into table Review
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (review_id, text, rating);

select * from Review;
