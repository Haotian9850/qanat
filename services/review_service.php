<?php
    
     function submit_review($text, $rate){
	  $conn = get_sql_connection();
      $insert_review = $conn->prepare(
            "INSERT INTO Review (review_id, text, rating) VALUES (?, ?, ?)"
        );
      $insert_review->bind_param(
            "isi",
            NULL,
			text,
			rate
        );
		
		try{
            if(!$insert_review->execute()){
              throw new Exception("SQL failed: ".$insert_car_type->error);
            }
        }catch(Exception $e){
            echo $e->getMessage();
            return NULL;
        }
    }
?>