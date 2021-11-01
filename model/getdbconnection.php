<?php

function getDbConnection(){

    $db_host = "localhost";
    $db_name = "jackytran_m133";
    $db_user = "jackytran";
    $db_pass = "Jaydi2003";

    $dbLink = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if(mysqli_connect_error()){
        echo mysqli_connect_error();
        exit;
    }

    return $dbLink;

}
