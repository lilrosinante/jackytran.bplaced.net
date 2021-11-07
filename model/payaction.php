<?php
session_start();
require "../model/getdbconnection.php";

$conn = getMy2DbConnection();

$user = $_SESSION['benutzer'];
$empfaenger = "<".$_SESSION['benutzer'].">";
$from = "jacky.tran@edu.tbz.ch";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "DELETE          
            FROM bookorder             
            WHERE user='$user'";
    $results = mysqli_query($conn, $sql);
    if (false === $results) {
        echo mysqli_error($conn);
    }
    $betreff = "Buch Rechnung von jackysbuchshop.ch";
    $from = "From: Jacky Tran <".$from.">";
    $text = "Guten Tag Mann/Frau\nAnbei finden Sie ihre Rechnung bezueglich der Buch Einkaeufe.\nDanke fuer Ihren Einkauf!";

    mail($empfaenger, $betreff, $text, $from);
    header("location:/model/booklist.php");
}
