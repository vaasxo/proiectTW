<?php
/**
 * @var $this View
 */

use core\View;

$this->title='About Us | Fitter';?>
<style>
    <?php include '../public/css/aboutUs.css'?>
    <?php include '../public/css/header.css'?>
    <?php include '../public/css/footer.css'?>
</style>

<body>
<main>
    <section>
        <section class="about-container">
            <div class="about-section">
                <h1 class="about-text">About Signature</h1>
                <p>We're a passionate group of people, working effortlessly to bring you the best user experience
                    available.</p>
            </div>
            <h2>Our Team</h2>
        </section>
        <div class="row">
            <div class="column">
                <div class="card">
                    <img src="../images/radu.jpg" alt="Radu">
                    <div class="container">
                        <h2>Radu Deleanu</h2>
                        <p class="title">Developer</p>
                        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                        <p>radu.deleanu14@gmail.com</p>
                        <button class="button">Contact</button>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <img src="../images/ondina.jpg" alt="Ondina">
                    <div class="container">
                        <h2>Ondina Lipsa</h2>
                        <p class="title">Developer</p>
                        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                        <p>lipsa.ondina@gmail.com</p>
                        <button class="button">Contact</button>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <img src="../images/cristi.jpg" alt="Cristian">
                    <div class="container">
                        <h2>Cristian Pelcear</h2>
                        <p class="title">Designer</p>
                        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                        <p>john@example.com</p>
                        <button class="button">Contact</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script><?php require_once("layouts/load_footer.js");?></script>
</main>

</body>