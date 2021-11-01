<?php

include '../model/getdbconnection.php';

//session_set_cookie_params(0, '/', "jackytran.bplaced.net", false ,true);
//session_start();
//session_regenerate_id();
$conn = getDbConnection();

//Daten, die in die Datenbak gesendet werden
$name = $_POST['benutzer'];
$pass = $_POST['password'];

//Query um die Daten herauszunehmen
$s = "select * from user where name='$name' && password = '$pass'";

//Die Daten, die man erhält
$result = mysqli_query($conn, $s);

$num = mysqli_num_rows($result);

//Ueberprueft, ob der Benutzername schon vergeben ist
if ($num == 1) {
    session_start();
    $_SESSION['benutzer'] = $name;
    header('location:/model/booklist.php');
    $_SESSION['logged_in'] = true;
}/* else {
    echo "Your login credentials might be wrong.";
}*/

include('../index.php');

