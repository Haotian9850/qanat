<?php
    
     function submit_review($text, $rate){
	  $conn = get_sql_connection();
      $create_user = $conn->prepare("SELECT * FROM User where username=?");
      $create_user->bind_param("s",$username);
      if(!$create_user->execute() || !$create_user->store_result()){
        throw new Exception('user_exists failed');
      }
      $rows = $create_user->num_rows;
      return $rows > 0;
    }
?>