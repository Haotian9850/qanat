<?php

    require("config.php");
    require("connect.php");
    require(SERVICE_PATH."auth_service.php");
    require(SERVICE_PATH."registration_service.php");
    require(SERVICE_PATH."station_service.php");
    require(SERVICE_PATH."user_service.php");
	require(SERVICE_PATH."review_service.php");

    session_start();

    $action = isset($_GET["action"]) ? $_GET["action"] : "";

    switch ($action) {
        case "register":
            register();
            break;
        case "login":
            login();
            break;
        case "logout":
            logout();
            break;
        case "review":
            review();
            break;
        default:
            homepage();
      }

    function register(){
        //build cars array
        if(!empty($_POST)){
            $cars = Array();
            foreach($_POST["vin"] as $i => $vin){
                $cars[] = (object)array(
                    "VIN"=>$vin,
                    "make"=>$_POST["make"][$i],
                    "model"=>$_POST["model"][$i],
                    "year"=>$_POST["year"][$i]
                );
            }
            //TODO: add exception handling
            if(register_service($_POST["username"], $_POST["password"], $cars)){
              $_SESSION["statusMsg"] = "Registration successful";
              unset($_SESSION["errMsg"]);
              header("Location:?action=login");
            }else{
              unset($_SESSION["statusMsg"]);
              // $_SESSION["errMsg"] = "Registration unsuccessful";
            }

        }
        require(TEMPLATE_PATH."register.php");
    }


    function login(){
        if(!isset($_SESSION["username"])){
            if(login_service($_POST["username"], $_POST["password"])){
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["statusMsg"] = "Successfully logged in for user ".$_POST["username"];
                unset($_SESSION["errMsg"]);
                homepage();
            }else{
                $_SESSION["errMsg"] = "Incorrect username or password";
                header("Location:?action=login");
            }
        }else{
            require(TEMPLATE_PATH."login.php");
        }
        
    }

    function logout(){
        session_destroy();
        header("Location:?action=homepage");
    }


    function homepage(){
        if(!isset($_SESSION["username"])){
            $stations = get_all_stations("visitor");
        }else{
            $stations = get_all_stations($_SESSION["username"]);
        }
        require(TEMPLATE_PATH."homepage.php");
    }
    
    
	function review(){
        if(!isset($_SESSION["username"])){
            $_SESSION["errMsg"] = "Please log in first";
            require(TEMPLATE_PATH."login.php");
        }else{  
            if(!empty($_POST)){
                if(add_review_service($_POST["comment"], $_POST["rating"], $_SESSION["username"])){
                    $_SESSION["statusMsg"] = "Successfully submitted review";
                    homepage();
                }else{
                    $_SESSION["errMsg"] = "Cannot submit review";
                    require(TEMPLATE_PATH."review.php");
                }
            }else{
                require(TEMPLATE_PATH."review.php");
            }
        }
    }







?>
