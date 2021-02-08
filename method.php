<?php
    include "controllers/controllers.inc.php";
    $method = (isset($_POST["action"])) ? $_POST["action"] : $_GET["action"];

    switch($method){
        case "login":
            Users::Login($_POST);
            break;
        case "reg":
            Users::Register($_POST);
            break;
        case "logout":
            Users::Logout();
            header("Location: /");
            break;
    }