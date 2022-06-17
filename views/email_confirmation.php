<?php
/**
 * @var $this \core\View
 */

$this->title='Email Confirmation | Fitter'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        <?php include '../public/css/email_confirmation.css'?>
        <?php include '../public/css/header.css'?>
        <?php include '../public/css/footer.css'?>
    </style>
</head>
<body>
    <main>
        <a href="/">
            <img class="Xicon" src="../images/x-mark.png" alt="X icon">
        </a>
        <img class="emailicon" src="../images/email.png" alt="email icon">
        <h1>THANK YOU!</h1>
        <p>We just sent you a confirmation email.<br>
           In order to sign in if you ever forget your password, you'll need to verify your email address.<br>
           Check out your inbox.</p>
    </main>
    <script><?php require_once("layouts/load_footer.js");?></script>
</body>
</html>
