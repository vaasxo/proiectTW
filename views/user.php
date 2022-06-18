<?php
/**
 * @var $this \core\View
 */

$this->title='Your Profile | Signature'?>
<style type="text/css">
    <?php include '../public/css/user.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>
<body>
<main>
    <section class="main-container">
        <div class="row--apply">
            <div class="support_container">
                <section class="image-and-info">
                    <figure class="autograph-image-container">
                        <img id="autograph-image" class="autograph-image" src="images/profile-picture.gif" alt="Image failed loading" >
                        <input class="autograph-image-select" name ="photo" type="file" accept="image/*" onchange="document.getElementById('autograph-image').src=window.URL.createObjectURL(this.files[0])">
                    </figure>
                    <div class="support_text">
                        <h1>
                            User Details
                        </h1>
                        <input name="username" placeholder="User name">
                        <input name="email" placeholder="Email">
                        <input name="number" placeholder="Phone number">
                        <input name="address" placeholder="Address">
                        <input name="workplace" placeholder="Workplace">
                        <section class="button_container">
                            <a href="#" class="save_button" onclick="alert('Modifications saved successfully.')">
                                Save
                            </a>
                        </section>

                    </div>
                </section>


                <div class="support_text_2">
                    <h1>
                        Autograph score
                    </h1>
                    <ul class="ul-ranks">
                        <li class="li-ranks">
                            <span class="Srank">S Rank </span>
                            <span class="Snr">1000</span>
                        </li>

                        <li class="li-ranks">
                            <span class="Arank">A Rank </span>
                            <span class="Anr">1000</span>
                        </li>

                        <li class="li-ranks">
                            <span class="Brank">B Rank </span>
                            <span class="Bnr">1000</span>
                        </li>

                        <li class="li-ranks">
                            <span class="Crank">C Rank </span>
                            <span class="Cnr">1000</span>
                        </li>

                        <li class="li-ranks">
                            <span class="Drank">D Rank </span>
                            <span class="Dnr">1000</span>
                        </li>

                        <li class="li-ranks">
                            <span class="Erank">E Rank </span>
                            <span class="Enr">1000</span>
                        </li>

                        <li class="li-ranks">
                            <span class="Frank">F Rank </span>
                            <span class="Fnr">1000</span>
                        </li>

                        <li class="li-ranks">
                            <span class="counter">Total </span>
                            <span class="Total">1000</span>
                        </li>

                        <li class="li-ranks">
                            <span class="online-time">Days spent </span>
                            <span class="time-spent">5000</span>
                        </li>

                    </ul>
                </div>

                <div class="support_text_3">
                    <h1 class="check-marketplace">
                        Check out our marketplace
                    </h1>
                    <p>
                        All of our users are automatically connected to our marketplace
                        where they can explore and interact with other passionate users.
                        This is the simplest way of obtaining the autographs you always longed for.
                    </p>
                    <p>
                        All of our users are automatically connected to our marketplace
                        where they can explore and interact with other passionate users.
                        This is the simplest way of obtaining the autographs you always longed for.
                    </p>  <p>
                        All of our users are automatically connected to our marketplace
                        where they can explore and interact with other passionate users.
                        This is the simplest way of obtaining the autographs you always longed for.
                    </p>
                </div>

            </div>
        </div>
    </section>
</main>
<script><?php require_once("layouts/load_footer.js");?></script>

</body>

</html>
