<?php

/** @var $model User */

/**
 * @var $this View
 */

$this->title = 'Register | Fitter';

use core\form\Section;
use core\View;
use models\User;

?>
<style>
    <?php include '../public/css/register.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>
<body>
<main>
    <?php $form = Section::begin("register_form", "post") ?>
    <h1 class="register_title"> Create Your Signature Account</h1>
    <div class="old_user">
        <span>Already have an account?</span>
        <a href="/login" class="signin_link">Sign In</a>
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
    <?php Section::end() ?>
</main>
<script><?php require_once("layouts/load_footer.js"); ?></script>
</body>
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $("#registerSubmit").click(function (e) {
            e.preventDefault();
            let emptyInputCount = 0;

            $("#registrationFrm input").each(function () {
                const input = $(this);
                if (input.val() === '') {
                    input.css('border-color', 'red');
                    emptyInputCount = 1;
                } else {
                    input.css('border-color', '#ced4da');
                }
            });


            let postObj;
            if (emptyInputCount === 0) {
                let getName = $("#floatingName").val();
                let getPhone = $("#floatingPhone").val();
                let getEmail = $("#floatingEmail").val();
                let getPassword = $("#floatingPassword").val();

                postObj = {
                    name: getName,
                    phone: getPhone,
                    email: getEmail,
                    password: getPassword,
                }

                $.ajax({
                    type: 'POST',
                    url: 'form_ajax.php',
                    data: postObj,
                    success: function (data) {
                        //console.log(data);
                        const parseJson = JSON.parse(data);

                        if (parseJson.success_msg) {
                            $("#response").html('<div class="alert alert-success">' + parseJson.success_msg + '</div>');
                        } else {
                            if (parseJson.error_count == 1) {
                                $("#response").html('<div class="alert alert-danger">' + parseJson.error_msg + '</div>');
                            } else {
                                let msg = '';
                                for (i = 0; i < parseJson.error_count; i++) {
                                    msg += '<div class="alert alert-danger">' + parseJson.error_msg[i] + '</div>';
                                }

                                $("#response").html(msg);
                            }
                        }
                    }
                })
            }
        });
    });
</script>