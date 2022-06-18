<?php

/** @var $model User */

/**
 * @var $this View
 */

$this->title = 'Login | Signature';
use core\form\Section;
use core\View;
use models\User;

?>
<style>
    <?php include '../public/css/login.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>

<body>
<main>
    <?php  $form = Section::begin("login_form","post")?>
        <h1 class="login_title"> Log In to Your Signature Account</h1>
        <div class="new_user">
            <span>Don't have an account?</span>
            <a href="/register" class="signup_link">Sign Up</a>
        </div>
        <div class="container_login">

            <?php echo $form->field($model, 'email') ?>
            <?php echo $form->field($model, 'password')->passwordField() ?>

            <section class="options">
                <div>
                    <input class="remember_checkbox" id="remember_me" type="checkbox" name="remember_me">
                    <label class="remember_label" for="remember_me">
                        Remember Me
                    </label>
                </div>
                <div class="forgot_pass">
                    <a href="/reset_password">Forgot Password?</a>
                </div>
            </section>

        <section class="button_container" type="submit">
          <button class="login_button">
            Log In
          </button>
        </section>

        <section class="TOS">
          *By logging in, you agree to our <a href="#">Terms of Use</a> and to receive
          Signature emails & updates and acknowledge that you read our <a href="#"> Privacy Policy.</a>
          You also acknowledge that Signature uses cookies to give the best user experience.
        </section>
      </div>
  <?php Section::end()?>
</main>
<script><?php require_once("layouts/load_footer.js");?></script>
</body>
