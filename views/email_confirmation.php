<?php
/**
 * @var $this View
 */

use core\View;

$this->title='Confirm Email | Signature'?>
<style>
    <?php include '../public/css/email_confirmation.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>
<body>
<main>
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
</main>
<script><?php require_once("layouts/load_footer.js");?></script>

</body>