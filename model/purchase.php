<?php
session_start();
require '../model/getdbconnection.php';

$conn = getMy2DbConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //$price = $formular['price'];
    //$book = $formular['title'];
    //$user = $_SESSION['benutzer'];
    $price = 0;


    $sql = "INSERT INTO bookorder
          (book, user, price)
         VALUES
           (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    if (false === $stmt) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param(
            $stmt,
            "ssi",
            $_POST['title'],
            $_SESSION['benutzer'],
            $price
        );

        if (mysqli_stmt_execute($stmt)) {
            header('location:/model/payment.php');
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }
}
?>
