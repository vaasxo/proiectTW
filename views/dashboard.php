<?php
/**
 * @var $this View
 */

use core\Application;
use core\View;

$this->title='Dashboard | Signature'?>
<style>
    <?php include '../public/css/dashboard.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>
<body>
<?php
$id=Application::$app->session->get('user');
$my_autograph_ids= \core\Application::$app->db->select('user_autographs',['user_id'=>$id],'autograph_id');
?>
<main>
    <span class="title">Your Collection</span>
    <div class="autograph-container">
            <?php

for($i=0; $i < count($my_autograph_ids); $i++) {
    $my_autographs = \core\Application::$app->db->select('autographs', ['id' => $my_autograph_ids[$i]], '*');

    echo "
        <div class=\"autograph\">
    <img class=\"autograph__image\" src=\"../uploaded_images/".$my_autographs[0]['image']."\
                 alt=\"Image failed loading\">
            <h2>".$my_autographs[0]['personality']."<br>".$my_autographs[0]['location']."</h2>
            <a class=\"autograph__link\" href=\"/autograph/".$my_autographs[0]['id']."\">
            <p>View autograph</p>
            </a>
    </div>

    ";
}?>
    </div>

        

</main>
<script><?php require_once("layouts/load_footer.js");?></script>

</body>

