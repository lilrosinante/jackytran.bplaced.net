<?php

include '../model/getdbconnection.php';

$conn = getMyDbConnection();

//Daten, die in die Datenbak gesendet werden
$name = $_POST['benutzer'];
$pass = $_POST['password'];

//Query um die Daten herauszunehmen
$sql = "select * from user where name='$name' && password = '$pass'";

//Die Daten, die man erhält
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);

//Ueberprueft, ob der Benutzername schon vergeben ist
if ($num == 1) {
    session_start();
    $_SESSION['benutzer'] = $name;
    header('location:/model/booklist.php');
    $_SESSION['logged_in'] = true;
} else {
    $error = "Your login credentials might be wrong.";
}

include('../index.php');

?>