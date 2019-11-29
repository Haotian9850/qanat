<?php 

    /*
    require("../connect.php");
    require("../config.php");
    require("user_service.php");
    */

    function add_review_service($comment, $rating, $username){
        $conn = get_sql_connection();
        $add_review = $conn->prepare("INSERT INTO Review (text, rating) VALUES (?, ?)");
        $add_review->bind_param(
            "si",
            $comment,
            $rating
        );
        try{
            $add_review->execute();
        }catch(Exception $e){
            echo $e->getMessage();
            return NULL;    # debug only
        }
        $add_makes = $conn->prepare("INSERT INTO Makes (review_id, user_id) VALUES (?, ?)");
        $user_id = get_id_by_name($username);
        $review_id = mysqli_insert_id($conn);
        $add_makes->bind_param(
            "ii",
            $user_id,
            $review_id
        );
        try{
            $add_makes->execute();
        }catch(Exception $e){
            echo $e->getMessage();
            return NULL;
        }
        return True;
    }




?>
