<?php
/**
 * @var $this \core\View
 */

$this->title='Upload | Signature'?>
<style type="text/css">
    <?php include '../public/css/upload.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>
<body>
<main>
    <div class="autograph-container">
        <figure class="autograph-image-container">
            <img id="autograph-image" class="autograph-image" src="../images/upload.png" alt="Image failed loading" >
            <input class="autograph-image-select" name ="photo" type="file" accept="image/*" onchange="document.getElementById('autograph-image').src=window.URL.createObjectURL(this.files[0]);
                                                                                                        document.getElementById('autograph-image').style.maxHeight='50vh'">
        </figure>

        <form class="autograph-data">
            <br><p>Add new autograph to your dashboard:</p>
            <div class="item">
                <br><br><label for="personality">Obtained from personality:</label>
                <input class="item-input" type="text" id="personality" name="personality" placeholder="Personality"><br>
            </div>

            <div class="item"><br>
                <label for="field">Enter autograph field (art/sports etc):</label>
                <input class="item-input" type="text" id="field" name="field" placeholder="Field"><br>
            </div>
            <div class="item"><br>
                <label for="context">Autograph obtained in following context:</label>
                <input class="item-input" type="text" id="context" name="context" placeholder="Context"><br>
            </div>
            <div class="item"><br>
                <label for="location">Geographical location:</label>
                <input class="item-input" type="text" id="location" name="location" placeholder="Location"><br>
            </div>
            <div class="item"><br>
                <label for="object">Placed on object:</label>
                <input class="item-input" type="text" id="object" name="object" placeholder="Object"><br>
            </div>
            <div class="item"><br>
                <label for="mentions">Special mentions:</label>
                <input class="item-input" type="text" id="mentions" name="mentions" placeholder="Mentions"><br>
            </div>
            <div class="item"><br>
                <label for="measures">Enter item dimensions:</label>
                <input class="item-input" type="text" id="measures" name="measures" placeholder="Measures"><br>
            </div>
            <div class="item"><br>
                <label for="price">Enter estimated value in USD:</label>
                <input class="item-input" type="text" id="price" name="price" placeholder="Value"><br>
            </div>
            <div class="item-for-tags" id="item-for-tags"><br>
                <div class="new-tag" id="new-tag">
                    <label for="tags">Enter autograph tag:</label>
                    <input class="item-input" type="text" id="tags" name="tags" placeholder="Tag">
                    <div id ="button_plus" class="button_plus" onclick="add_tag_field()"></div><br><br>
                </div>

            </div>
            <div class="item">
                <br><input class="marketplace_checkbox" id="marketplace" type="checkbox" name="marketplace" onclick="get_confirmation_marketplace()">
                <label class="marketplace" for="marketplace">
                    Add to Marketplace
                </label>
            </div>
            <section class="button_container">
                <button type="submit" class="upload_button">
                    Upload
                </button>
            </section>

        </form>

    </div>
</main>
<script><?php require_once("layouts/load_footer.js");?></script>

</body>

</html>


