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
$managed_by_user_id = \core\Application::$app->db->select('user_autographs', ['autograph_id'=>$id],'*');
$user_id=$managed_by_user_id[0]['user_id'];
$user_name=Application::$app->db->select('users',['id'=>$user_id],'email')[0];
?>
<main>
    <div class="autograph-container">
        <img class="autograph-image" src="../uploaded_images/<?php echo $autograph_field_list[0]['image'];?>" alt="Image failed loading">
        <form class="autograph-data">
            <div class="item">
                <br><label for="personality">Obtained from personality:</label>
                <input class="item-input" type="text" id="personality" name="personality" value="<?php echo $autograph_field_list[0]['personality'];?>"><br>
            </div>

            <div class="item">
                <label for="field">Field:</label>
                <input class="item-input" type="text" id="field" name="field" value="<?php echo $autograph_field_list[0]['field'];?>"><br>
            </div>
            <div class="item">
                <label for="context">Context:</label>
                <input class="item-input" type="text" id="context" name="context" value="<?php echo $autograph_field_list[0]['context'];?>"><br>
            </div>
            <div class="item">
                <label for="location">Location:</label>
                <input class="item-input" type="text" id="location" name="location" value="<?php echo $autograph_field_list[0]['location'];?>"><br>
            </div>
            <div class="item">
                <label for="object">Placed on object:</label>
                <input class="item-input" type="text" id="object" name="object" value="<?php echo $autograph_field_list[0]['object'];?>"><br>
            </div>
            <div class="item">
                <label for="mentions">Special mentions:</label>
                <input class="item-input" type="text" id="mentions" name="mentions" value="<?php echo $autograph_field_list[0]['mentions'];?>"><br>
            </div>
            <div class="item">
                <label for="measures">Measures:</label>
                <input class="item-input" type="text" id="measures" name="measures" value="<?php echo $autograph_field_list[0]['measures'];?>"><br>
            </div>
            <div class="item">
                <label for="price">Estimated value:</label>
                <input class="item-input" type="text" id="price" name="price" value="<?php echo $autograph_field_list[0]['price'];?>$"><br>
            </div>
            <div class="item">
                <?php //check if current autograph is managed by current user
                if (\core\Application::$app->db->select('user_autographs',['user_id'=>Application::$app->session->get('user'), 'autograph_id'=>$id],'*')!=null):?>
                <br><input class="marketplace_checkbox" id="marketplace" type="checkbox" name="marketplace" onclick="get_confirmation_marketplace()">
                <label class="marketplace" for="marketplace">
                    Add to Marketplace
                </label>
                <?php else:?>
                <section class="managed_by_user">User:<?php echo $user_name;?>
                </section>
                <section class="button_container">
                    <a type="submit" class="bid_button" onclick="get_bid_amount()">
                        Bid
                    </a>
                    <div id="bid_amount"></div>
                    <script>
                        function get_bid_amount(){
                            let content = document.getElementById('bid_amount')
                            let amount = window.prompt("Enter the bid amount in $")
                            if(amount !== null){

                                var httpc = new XMLHttpRequest();
                                httpc.onreadystatechange = function() { //Call a function when the state changes.
                                    if(httpc.readyState === 4 && httpc.status === 200) { // complete and no errors
                                        content.innerText = httpc.responseText; // some processing here, or whatever you want to do with the response
                                    }
                                    else{
                                        content.innerText = httpc.
                                    }
                                };
                                httpc.open('GET', 'send_notification?q='+amount+'%'+Date.now(), true);
                                httpc.send();
                            }

                        }
                    </script>
                    <a href="/dashboard" class="trade_button">
                        Trade
                    </a>

                </section>
                <?php endif?>
            </div>
            <br><span class="tags">Tags: </span>
            <div class="flex-list">
                <ul class="autograph-tags">
                    <?php
                    $autograph_tags_list= \core\Application::$app->db->select('autograph_tags',['autograph_id'=>$id],'tag_id');
                    $autograph_names_list=array();
                    foreach ($autograph_tags_list as $autograph_tag_id)
                        $autograph_names_list[]= \core\Application::$app->db->select('tags',['id'=>$autograph_tag_id],'name');

                    foreach ($autograph_names_list as $autograph_name)
                        for($i=0;$i<count($autograph_name);$i++)
                            echo "<li class=\"autograph-tag\">$autograph_name[$i]</li>";?>
                </ul>
            </div>
            <?php if (\core\Application::$app->db->select('user_autographs',['user_id'=>Application::$app->session->get('user'), 'autograph_id'=>$id],'*')!=null):?>
            <section class="button_container">
                <a href="/dashboard" class="save_button" onclick="alert('Modifications saved successfully.')">
                    Save
                </a>
            </section>
            <?php endif?>
        </form>
    </div>
</main>
<script><?php require_once("layouts/load_footer.js");?></script>
<script type="text/javascript"><?php require_once("layouts/confirmation.js");?></script>
</body>
