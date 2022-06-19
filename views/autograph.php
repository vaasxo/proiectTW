<?php
/**
 * @var $this View
 */

use core\Application;
use core\View;

$this->title='Autograph | Signature'?>
<style>
    <?php include '../public/css/autograph.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>
<body>
<?php
$url = $_SERVER['REQUEST_URI'];
$id = substr($url, strpos($url,'/autograph/')+strlen('/autograph/'));
$autograph_field_list= \core\Application::$app->db->select('autographs',['id'=>$id],'*');
?>
<main>
    <div class="autograph-container">
        <img class="autograph-image" src="../uploaded_images/<?php echo $autograph_field_list['image'];?>" alt="Image failed loading">
        <form class="autograph-data">
            <div class="item">
                <br><label for="personality">Obtained from personality:</label>
                <input class="item-input" type="text" id="personality" name="personality" value="<?php echo $autograph_field_list['personality'];?>"><br>
            </div>

            <div class="item">
                <label for="field">Field:</label>
                <input class="item-input" type="text" id="field" name="field" value="<?php echo $autograph_field_list['field'];?>"><br>
            </div>
            <div class="item">
                <label for="context">Context:</label>
                <input class="item-input" type="text" id="context" name="context" value="<?php echo $autograph_field_list['context'];?>"><br>
            </div>
            <div class="item">
                <label for="location">Location:</label>
                <input class="item-input" type="text" id="location" name="location" value="<?php echo $autograph_field_list['location'];?>"><br>
            </div>
            <div class="item">
                <label for="object">Placed on object:</label>
                <input class="item-input" type="text" id="object" name="object" value="<?php echo $autograph_field_list['object'];?>"><br>
            </div>
            <div class="item">
                <label for="mentions">Special mentions:</label>
                <input class="item-input" type="text" id="mentions" name="mentions" value="<?php echo $autograph_field_list['mentions'];?>"><br>
            </div>
            <div class="item">
                <label for="measures">Measures:</label>
                <input class="item-input" type="text" id="measures" name="measures" value="<?php echo $autograph_field_list['measures'];?>"><br>
            </div>
            <div class="item">
                <label for="price">Estimated value:</label>
                <input class="item-input" type="text" id="price" name="price" value="<?php echo $autograph_field_list['estimated_value'];?>$"><br>
            </div>
            <div class="item">
                <?php //check if current autograph is managed by current user
                if (\core\Application::$app->db->select('user_autographs',['user_id'=>Application::$app->session->get('user'), 'autograph_id'=>$id],'*')!=null):?>
                <br><input class="marketplace_checkbox" id="marketplace" type="checkbox" name="marketplace" onclick="get_confirmation_marketplace()">
                <label class="marketplace" for="marketplace">
                    Add to Marketplace
                </label>
                <?php else:?>
                <section class="button_container">
                    <a href="#" class="bid_button" onclick="get_bid_amount()">
                        Bid
                    </a>
                    <a href="/dashboard" class="trade_button">
                        Trade
                    </a>

                </section>
                <?php endif?>
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
                <a href="/dashboard" class="save_button" onclick="alert('Modifications saved successfully.')">
                    Save
                </a>
            </section>
        </form>
    </div>
</main>
<script><?php require_once("layouts/load_footer.js");?></script>

</body>
