<?php
/**
 * @var $this View
 */

use core\View;

$this->title='Forgot Password | Signature'?>
<style>
    <?php include '../public/css/forgotPass.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>
<body>
<main>
    <form class="forgotPass_form">
        <h1 class="forgotPass_title"> Forgot Your Password?</h1>
        <div class="forgotPass_subtitle">
            <span>No worries. Enter your email address below, and we'll send you a reset link.</span>
        </div>
        <div class="container_forgotPass">
            <section class="email_input_container">
                <label>
                    <input class="email_input" type="email" name="email" placeholder="Email Address" autofocus>
                </label>
            </section>
            <section class="button_container">
                <a href="/pass_reset_confirmation" class="submit_button">
                    Submit
                </a>
            </section>
        </div>
    </form>
</main>
<script><?php require_once("layouts/load_footer.js");?></script>

</body>

