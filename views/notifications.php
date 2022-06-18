<?php
/**
 * @var $this View
 */

use core\View;

$this->title='Notifications | Signature'?>
<style>
    <?php include '../public/css/notifications.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>
<body>
<main>
    <p class="title">Notifications</p>
    <section class="notifications-container">

        <div class="notification">
            <a href="/user"><img class="notification-user" src="../images/profile-picture-1.jpg" alt="user"></a>
            <div class="notification-info">
                <span class="notification-text"><a href="/user"><b>User</b></a><small> placed a bid of 1000$ on your <a href="/autograph">autograph</a>.</small> </span>
                <h5>Apr 15 at 3:14PM</h5>
            </div>

        </div>
        <div class="notification-read">
            <img class="notification-user" src="../images/profile-picture-1.jpg" alt="user">
            <div class="notification-info">
                <span class="notification-text"><a href="user.html"><b>User</b></a><small> wants to trade this autograph with the following:
                    <a href="/autograph">Pablo Picasso</a></small> </span>
                <h5>Apr 15 at 3:14PM</h5>
            </div>

        </div>
        <div class="notification">
            <img class="notification-user" src="../images/profile-picture-1.jpg" alt="user">
            <div class="notification-info">
                <span class="notification-text"><a href="/user"><b>User</b></a><small> placed a bid of 1000$ on your autograph.</small> </span>
                <h5>Apr 15 at 3:14PM</h5>
            </div>

        </div>
    </section>
</main>
<script><?php require_once("layouts/load_footer.js");?></script>

</body>

