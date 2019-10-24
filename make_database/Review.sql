load data local infile 'Review.csv' into table Review
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (review_id, text, rating);

select * from Review;
