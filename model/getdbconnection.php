<?php

function getMyDbConnection(){

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

function getMy2DbConnection(){

    $db_host = "localhost";
    $db_name = "jackytran_m151";
    $db_user = "jackytran_2";
    $db_pass = "Jaydi2003";

    $dbLink = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if(mysqli_connect_error()){
        echo mysqli_connect_error();
        exit;
    }

    return $dbLink;
}

function getPgDbConnection(){

    $db_host = "localhost";
    $db_name = "jackytran_m151";
    $db_user = "jackytran_2";
    $db_pass = "Jaydi2003";

    $pg = "host=$db_host user=$db_user password=$db_pass dbname=$db_name";

    return pg_connect($pg);

}
