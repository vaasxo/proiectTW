<?php
/**
 * @var $this View
 */

use core\View;

$this->title='Contact | Signature'?>
<style>
    <?php include '../public/css/contact.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>
<body>
<main>
    <form class="contact_form">
        <h1 class="contact_title"> Get in Touch with Signature!</h1>
        <div class="subtitle">
            <span>We'll get back to you by email in a timely manner</span>
        </div>
        <div class="container_contact">
            <section class="firstName_input_container">
                <label>
                    <input class="firstName_input" type="text" name="firstName" placeholder="First Name" >
                </label>
            </section>
            <section class="lastName_input_container">
                <label>
                    <input class="lastName_input" type="text" name="lastName" placeholder="Last Name" >
                </label>
            </section>
            <section class="email_input_container">
                <label>
                    <input class="email_input" type="email" name="email" placeholder="Email Address" autofocus>
                </label>
            </section>
            <section class="text_input_container">
                <label>
                    <textarea name="message" id="message" cols="64" rows="10" placeholder="Message"></textarea>
                </label>
            </section>

            <section class="button_container">
                <a href="/homepage" class="submit_button" onclick="alert('Thanks for reaching us! We are looking into the issue and will have an answer for you shortly.')">
                    Submit
                </a>
            </section>
        </div>
    </form>
</main>
<script><?php require_once("layouts/load_footer.js");?></script>

</body>
