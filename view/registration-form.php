<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register Formular</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
<header>
    <h2 id="head">Jacky's Book Office 🧾</h2>
</header>

<img src="img/bookshelf.jpg" alt="first" width="1904">

<form action="../model/registration.php" method="post">
    <span href="#" class="button" id="toggle-login"><h1>Register</h1></span>
    <div id="register">
        <div class="field">
            <input name="name" id="name" type="email" placeholder="Email" required="required">
        </div>
        <div class="field">
            <input name="password" id="password" type="password" placeholder="Password" required="required">
        </div>
        <div class="g-recaptcha" data-sitekey="6Let1pMaAAAAADpe8Rrg-89k1fhxyhRBufDFP5db"></div>
        <br/>
        <div class="field half actions">
            <input type="submit" class="button alt" name="btn_speichernsenden" value="&nbsp; Register &nbsp;">
        </div>
        <p>You already have an account? Click <a href="../index.php">here</a> to login</p>
        <br>
        <br>
        <br>
        <br>
    </div>
</form>

<?php require '../view/footer.php'; ?>
