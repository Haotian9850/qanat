<?php

    require("config.php");
    require("connect.php");
    require(SERVICE_PATH."auth_service.php");
    require(SERVICE_PATH."registration_service.php");
    require(SERVICE_PATH."station_service.php");
    require(SERVICE_PATH."cars_service.php");


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
        case "profile":
            profile();
            break;
        default:
            homepage();
      }

    function register(){
        //build cars array
        if(!empty($_POST)){
            //TODO: add exception handling
            if(register_user_service($_POST["username"], $_POST["password"])){
              $_SESSION["statusMsg"] = "Registration successful";
              unset($_SESSION["errMsg"]);
              header("Location:?action=login");
            }else{
              unset($_SESSION["statusMsg"]);
              $_SESSION["errMsg"] = "Registration unsuccessful";
            }

        }
        require(TEMPLATE_PATH."register.php");
    }


    function login(){
        if(!empty($_POST)){
            if(login_service($_POST["username"], $_POST["password"])){
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["statusMsg"] = "Successfully logged in for user ".$_POST["username"];
                unset($_SESSION["errMsg"]);
                header("Location:?action=homepage");
            }else{
                $_SESSION["errMsg"] = "Incorrect username or password";
                header("Location:?action=login");
            }
        }
        require(TEMPLATE_PATH."login.php");
    }

    function logout(){
        session_destroy();
        header("Location:?action=homepage");
    }

    function profile(){
        if(empty($_SESSION["username"])){header("Location:?action=login");}
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
            if(register_cars_service($cars, $_SESSION["username"])){
              $_SESSION["statusMsg"] = "Registration successful";
              unset($_SESSION["errMsg"]);
              header("Location:?action=profile");
            }else{
              unset($_SESSION["statusMsg"]);
              // $_SESSION["errMsg"] = "Registration unsuccessful";
            }

        }
        $cars = get_owned_cars($_SESSION["username"]);
        $stations = get_all_stations();
        require(TEMPLATE_PATH."profile.php");
    }


    function homepage(){
        $stations = get_all_stations();
        require(TEMPLATE_PATH."homepage.php");
    }








?>
