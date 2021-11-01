<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Formular</title>
    <link rel="stylesheet" href="/view/css/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
<header>
    <h2 id="head">Skør Book Office 🧾</h2>
</header>

<img src="/view/img/bookshelf.jpg" alt="first" width="1904">

<span href="#" class="button" id="toggle-login"><h1>Log in</h1></span>

<div id="login">
    <form action="/controller/login.php" method="post">
        <input type="email" name="benutzer" placeholder="Email"/>
        <input type="password" name="password" placeholder="Password"/>
        <div class="g-recaptcha" data-sitekey="6Let1pMaAAAAADpe8Rrg-89k1fhxyhRBufDFP5db"></div>
        <br/>
        <input type="submit" value="Log in"/>
        <p>No account? Click <a href="/view/registration-form.php">here</a> to register</p>
        <br>
        <br>
        <br>
        <br>
    </form>
</div>

<?php require 'view/footer.php';?>