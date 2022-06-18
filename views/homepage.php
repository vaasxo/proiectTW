<?php
/**
 * @var $this View
 */

use core\Application;
use core\View;

$this->title='Home | Signature'?>
<style>
    <?php include '../public/css/homepage.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>
<body>
    <main>
        <section class="hero_container">
            <div class="crop_container">
                <img class="hero_image" src="../images/bgimage.jpg" alt="hero_image">
                <div class="hero_overlay">
                    <div class="title"><span class="hero_overlay_title">THE LEADING WEBSITE IN DIGITAL SIGNATURE STORAGE</span>
                    </div>
                    <span class="hero_overlay_subtitle"> Store, Trade and Get Top-Tier Appraisals on <span class="your">Your</span> Autographs
                </span>
                    <div>
                        <?php if (Application::isGuest()):?>
                            <a href="/register" class="get_started">
                                Get Started
                            </a>
                        <?php endif?>
                    </div>
                </div>
            </div>
        </section>
        <section class="motivation_section">
            <div class="row--apply">
                <div class="motivation_container">
                    <div class="motivation_text">
                        <p>
                            Experience your most prized autographs in a new way.
                        </p>
                        <ul>
                            <li>- Store your autographs digitally</li>
                            <li>- Trade with other members</li>
                            <li>- Get professional valuations</li>
                        </ul>
                    </div>
                    <div class="motivation_img">
                        <img src="../images/celebs.svg" alt="workout">
                    </div>
                </div>
            </div>
        </section>
        <section class="benefits_section">
            <div class="row--apply">
                <div class="benefits_container">
                    <div class="benefits_img">
                        <img src="../images/onlinePay.svg" alt="energizer" width="301" height="274">
                    </div>
                    <div class="benefits_text">
                        <h1>
                            What's best for you, and your preferences.
                        </h1>
                        <p>Each autograph contains explicit details about the place, date
                            and time it was signed, information on how to take care of it and
                            tags, for a simpler organizing experience.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="marketplace_section">
            <div class="row--apply">
                <div class="support_container">
                    <div class="support_text">
                        <h1>
                            Check out our marketplace
                        </h1>
                        <p>
                            All of our users are automatically connected to our marketplace
                            where they can explore and interact with other passionate users.
                            This is the simplest way of obtaining the autographs you always longed for.
                        </p>
                    </div>
                    <div class="support_img">
                        <img src="../images/communication.svg" alt="lifestyle" width="301" height="274">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script><?php require_once("layouts/load_footer.js");?></script>

</body>
