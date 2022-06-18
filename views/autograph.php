<?php
/**
 * @var $this \core\View
 */

$this->title='Autograph | Signature'?>
<style type="text/css">
    <?php include '../public/css/autograph.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>
<body>
<main>
    <div class="autograph-container">
        <img class="autograph-image" src="https://image.invaluable.com/housePhotos/Novartia/89/722689/H20754-L287632162_original.jpg" alt="Image failed loading">
        <form class="autograph-data">
            <div class="item">
                <br><label for="personality">Obtained from personality:</label>
                <input class="item-input" type="text" id="personality" name="personality" value="Pablo Picasso"><br>
            </div>

            <div class="item">
                <label for="field">Field:</label>
                <input class="item-input" type="text" id="field" name="field" value="Art"><br>
            </div>
            <div class="item">
                <label for="context">Context:</label>
                <input class="item-input" type="text" id="context" name="context" value="Exhibition"><br>
            </div>
            <div class="item">
                <label for="location">Location:</label>
                <input class="item-input" type="text" id="location" name="location" value="Musée Picasso, Côte d’Azur, France"><br>
            </div>
            <div class="item">
                <label for="object">Placed on object:</label>
                <input class="item-input" type="text" id="object" name="object" value="drawing"><br>
            </div>
            <div class="item">
                <label for="mentions">Special mentions:</label>
                <input class="item-input" type="text" id="mentions" name="mentions" value="Includes the drawing made by Pablo Picasso"><br>
            </div>
            <div class="item">
                <label for="measures">Measures:</label>
                <input class="item-input" type="text" id="measures" name="measures" value="30 x 21 cm; framed 43 x 27 cm;"><br>
            </div>
            <div class="item">
                <label for="price">Estimated value:</label>
                <input class="item-input" type="text" id="price" name="price" value="2500-3000$"><br>
            </div>
            <div class="item">
                <br><input class="marketplace_checkbox" id="marketplace" type="checkbox" name="marketplace" onclick="get_confirmation_marketplace()">
                <label class="marketplace" for="marketplace">
                    Add to Marketplace
                </label>
                <section class="button_container">
                    <a href="#" class="bid_button" onclick="get_bid_amount()">
                        Bid
                    </a>
                    <a href="/dashboard" class="trade_button">
                        Trade
                    </a>

                </section>
            </div>
            <br><span class="tags">Tags: </span>
            <div class="flex-list">
                <ul class="autograph-tags">
                    <li class="autograph-tag">drawing</li>
                    <li class="autograph-tag">portrait</li>
                    <li class="autograph-tag">woman</li>
                    <li class="autograph-tag">frame</li>
                    <li class="autograph-tag">celebrity</li>
                </ul>
            </div>
            <section class="button_container">
                <a href=",dashboard" class="save_button" onclick="alert('Modifications saved successfully.')">
                    Save
                </a>
            </section>
        </form>
    </div>
</main>
<script><?php require_once("layouts/load_footer.js");?></script>

</body>

</html>

