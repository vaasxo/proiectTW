<?php
/**
 * @var $this View
 */

use core\View;

$this->title='FAQ | Signature'?>
<style>
    <?php include '../public/css/faq.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>
<body>
<main>
    <section class="accordion_container_section">
        <div class="accordion_container">
            <div class="accordion">
                <div class="accordion_item" id="question1">
                    <a class="accordion_link" href="#question1">
                        What is Signature?
                    </a>
                    <div class="answer">
                        <p>
                            Signature is the leading website for people all over the world looking to store their
                            autographs digitally and trade with other users in order to obtain the autographs that
                            they've always wanted. We are a passionate team that works for a passionate audience, always
                            improving our services and user experience.
                        </p>
                    </div>
                </div>
                <div class="accordion_item" id="question2">
                    <a class="accordion_link" href="#question2">
                        How are my autographs stored?
                    </a>
                    <div class="answer">
                        <p>
                            All autographs are stored digitally in our database. The physical version is, of course, still
                            in your possessions, our platform being a way of keeping track of your collection and interacting
                            with others who share a passion for autographs.
                        </p>
                    </div>
                </div>
                <div class="accordion_item" id="question3">
                    <a class="accordion_link" href="#question3">
                        Who does the appraisals on my autographs?
                    </a>
                    <div class="answer">
                        <p>
                            All appraisals are done by our team of highly-credited masters of the market. They ensure that
                            you get the best and the fairest price for your autographs, taking every detail into account.
                            If you want to join our appraisals team, email us via the contact form with an appropriate message :)
                        </p>
                    </div>
                </div>
                <div class="accordion_item" id="question4">
                    <a class="accordion_link" href="#question4">
                        Are you planning on implementing a man-in-the-middle system for trading on your website?
                    </a>
                    <div class="answer">
                        <p>
                            Yes! As we speak, our team of developers is hard at work, trying to finish everything necessary
                            for our users to have a complete experience on our website, including the secure trading of their
                            autographs. You will be able to send the autographs to us, where we will check their authenticity
                            and then send them on to the buyer. The process will go both ways, if you decide to trade for another
                            autograph.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script><?php require_once("layouts/load_footer.js");?></script>

</body>
