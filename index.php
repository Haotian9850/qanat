<?php 

    require("config.php");
    require("connect.php");
    require(SERVICE_PATH."auth_service.php");
    require(SERVICE_PATH."registration_service.php");




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
        default:
          homepage(); 
      }

      
      function register(){
          
      }

    
    





?>