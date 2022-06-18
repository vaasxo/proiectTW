<?php

/** @var $model User */
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

        <?php  $form = \core\form\Section::begin("autograph-data","post")?>
            <p class="sub-title">Add new autograph to your dashboard:</p>
            <div class="item">
                <label for="personality">Obtained from personality:</label>
                <?php echo $form->field($model, 'personality') ?>
            </div>

            <div class="item">
                <label for="field">Enter autograph field (art/sports etc):</label>
                <?php echo $form->field($model, 'field') ?>
            </div>
            <div class="item">
                <label for="context">Autograph obtained in following context:</label>
                <?php echo $form->field($model, 'context') ?>
            </div>
            <div class="item">
                <label for="location">Geographical location:</label>
                <?php echo $form->field($model, 'location') ?>
            </div>
            <div class="item">
                <label for="object">Placed on object:</label>
                <?php echo $form->field($model, 'object') ?>
            </div>
            <div class="item">
                <label for="mentions">Special mentions:</label>
                <?php echo $form->field($model, 'mentions') ?>
            </div>
            <div class="item">
                <label for="measures">Enter item dimensions:</label>
                <?php echo $form->field($model, 'measures') ?>
            </div>
            <div class="item">
                <label for="price">Enter estimated value in USD:</label>
                <?php echo $form->field($model, 'price') ?>
            </div>
            <div class="item-for-tags" id="item-for-tags">
                <div class="new-tag" id="new-tag">
                    <label for="tags">Enter autograph tag:</label>
                    <?php echo $form->field($model, 'tag') ?>
                    <div id ="button_plus" class="button_plus" onclick="add_tag_field()"></div>
                </div>

            </div>
            <div class="item">
                <input class="marketplace_checkbox" id="marketplace" type="checkbox" name="marketplace" onclick="get_confirmation_marketplace()">
                <label class="marketplace" for="marketplace">
                    Add to Marketplace
                </label>
            </div>
            <section class="button_container">
                <button type="submit" class="upload_button">
                    Upload
                </button>
            </section>

        <?php \core\form\Section::end()?>

    </div>
</main>
<script><?php require_once("layouts/load_footer.js");?></script>
<script><?php require_once("layouts/upload_tag.js");?></script>
</body>

</html>


