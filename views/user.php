<?php
/**
 * @var $this View
 */

use core\Application;
use core\View;

$this->title='Your Profile | Signature'?>
<style>
    <?php include '../public/css/user.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>
<?php
$id=Application::$app->session->get('user');
$my_autograph_ids= \core\Application::$app->db->select('user_autographs',['user_id'=>$id],'autograph_id');

$my_top=array();
$count=0;

for($i=0; $i < count($my_autograph_ids); $i++)
{
    if($count>8)
    {break;}
$my_autographs = \core\Application::$app->db->select('autographs', ['id' => $my_autograph_ids[$i]], 'personality')[0];
if(array_key_exists($my_autographs,$my_top))
{$my_top[$my_autographs]+=1;}
   else
   {    $my_top[$my_autographs]=1;
       $count++;
   }

}
foreach($my_top as $key=>$value)
{

    echo $key.", ".$value."<br>";
}
?>
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
<!--luam userul, selectam
-->

                <div class="support_text_2">
                    <h1>
                        Autograph score
                    </h1>
                    <ul class="ul-ranks">
                            <?php
                            foreach($my_top as $key=>$value)
                            {
                                echo "<li class=\"li-ranks/\">";
                                echo "<span class=\"Srank\">$key </span>";
                                echo "<span class=\"Snr\">$value</span>";
                                echo "</li>";
                            }

                            echo "<li class=\"li-ranks/\">";
                            echo "<span class=\"Srank\">Total celebritati </span>";
                            echo "<span class=\"Snr\">".count($my_top)."</span>";
                            echo "</li>";
                            ?>


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
