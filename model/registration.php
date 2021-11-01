<?php

require 'getdbconnection.php';

session_start();
$conn = getDbConnection();

$name = $_POST['name'];
$pass = $_POST['password'];

//Query um die Daten wieder herauszunehmen
$s = "select * from user where name='$name'";

//Die Daten, die man erhält
$result = mysqli_query($conn, $s);

$num = mysqli_num_rows($result);

//Ueberprueft, ob der Benutzername schon vergeben ist
if ($num == 1) {
    header("location:../view/registration-form.php");
    echo "A account with this email already exists.";
} else {
    $reg = "insert into user (name, password) values ('$name', '$pass')";
    mysqli_query($conn, $reg);
    header("location:/index.php");
}
?>