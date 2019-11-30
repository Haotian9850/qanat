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
        $conn->close();
        return True;
    }

    //TODO: add stored procedure here
    /**
     * @RETURNS: average rating + number of users
     */
    function get_stored_procedure_results(){
        $conn = get_sql_connection();
        $results = Array();
        #$sp = $conn->prepare("CALL `statgen`(@p0, @p1);SELECT @p0 AS `num_users`, @p1 AS `avg_rating`;");
        $result = $conn->query("CALL `statgen`(@p0, @p1)");
        $r = $conn->query("SELECT @p0 AS `num_users`, @p1 AS `avg_rating`");
        $row = $r->fetch_assoc();
        $conn->close();
        return Array(
            "numUsers"=>$row["num_users"],
            "avgRating"=>$row["avg_rating"]
        );
    }

    function get_all_reviews(){
        $conn = get_sql_connection();
        $get_reviews = "SELECT * FROM Review";
        try{
            $result = mysqli_query($conn, $get_reviews);
        }catch(Exception $e){
            echo $e->getMessage();
            return NULL;
        }
        $reviews = Array();
        while($row=$result->fetch_assoc()){
            $reviews[] = $row;
        }
        $conn->close();
        return $reviews;
    }

?>
