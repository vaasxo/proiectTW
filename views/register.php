<?php

/** @var $model User */

/**
 * @var $this \core\View
 */

$this->title = 'Register | Fitter';

use core\form\Section;
use models\User;

?>
<style type="text/css">
    <?php include '../public/css/register.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>
<body>
<main>
    <?php $form = Section::begin("register_form","post")?>
        <h1 class="register_title"> Create Your Signature Account</h1>
        <div class="old_user">
            <span>Already have an account?</span>
            <a href="/loginl" class="signin_link">Sign In</a>
        </div>
        <div class="container_register">
            <?php echo $form->field($model, 'email') ?>
            <?php echo $form->field($model, 'password')->passwordField() ?>
            <?php echo $form->field($model, 'confirmPass')->passwordField() ?>

            <section class="button_container" type="submit">
                <button class="register_button">
                    Register
                </button>
            </section>
            <section class="TOS">
                *By registering, you agree to our <a href="#">Terms of Use</a> and to receive
                Signature emails & updates and acknowledge that you read our <a href="#"> Privacy Policy.</a>
                You also acknowledge that Signature uses cookies to give the best user experience.
            </section>
        </div>
    <?php Section::end()?>
</main>
<script><?php require_once("layouts/load_footer.js");?></script>
</body>
</html>