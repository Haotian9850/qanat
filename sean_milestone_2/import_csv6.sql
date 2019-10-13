load data local infile 'MOCK_DATA(6).csv' into table Review
 fields terminated by ','
 enclosed by '"'
 lines terminated by '\n'
 (review_id, text, rating);

select * from Review;
