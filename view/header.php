<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('location:/index.php');
} ?>

<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha3849aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/view/css/style.css">
    <title>Eintrittsformular</title>
</head>

<body>

<script src="js/index.js"></script>

<header>
    <h2 id="head">Jacky's Book Shop 🧾</h2>
</header>
<ul class="nav-bar">
    <li class="nav-decoration"><a class="formular_page" href="../model/createbook.php">Add Book</a></li>

    <li class="nav-decoration"><a class="formularlist_page" href="../model/booklist.php">Book List</a></li>

    <li class="nav-decoration"><a class="contact_page" href="../view/mailformular.php">Contact Us</a></li>

    <li class="nav-decoration"><a class="contact_page" href="../model/payment.php">Pay</a></li>

    <li class="nav-decoration"><a class="contact_page" href="../controller/logout.php">Log Out</a></li>
</ul>
<main>