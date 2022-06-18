<?php
/**
 * @var $this View
 */

use core\View;

$this->title='Password Reset | Signature'?>
<style>
    <?php include '../public/css/passResetConfirmation.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>
<body>
<main>
    <a href="/homepage">
        <img class="Xicon" src="images/x-mark.png" alt="X icon">
    </a>
    <img class="emailicon" src="images/email.png" alt="email icon">
    <p>We have sent you a password reset link.<br>
        Check your inbox and follow the link to set a new password.</p>
</main>
<script><?php require_once("layouts/load_footer.js");?></script>

</body>
