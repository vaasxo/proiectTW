<?php
/**
 * @var $this \core\View
 */

$this->title = 'Marketplace | Signature' ?>
<style>
    <?php include '../public/css/market.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>
<body>
<div class="searchbar">
    <div class="searchbar2">
        <input type="text" onkeyup="imu(this.value)" placeholder="Search.." id="search_bar_content">
        <div id="search_content" class="search_content"></div>
    </div>
    <section class="button_container" type="submit">
        <button class="button-afisare" onclick="getAutographsByTag()">
            Search
        </button>
    </section>
    <script type="text/javascript">
        let content = document.getElementById('search_content');

        function imu(x){
            if(x.length === 0){
                content.innerHTML = '';
            } else {
                var XML = new XMLHttpRequest();
                XML.onreadystatechange = function () {
                    if (XML.readyState === 4 && XML.status === 200) {
                        content.innerHTML = XML.responseText
                    }
                };

                XML.open('GET', 'liveSearch?q='+x+'&'+Date.now(), true);
                XML.setRequestHeader("Content-Type", "Text/HTML")
                XML.send();
            }
        }

        function getAutographsByTag(){
            let search_input = document.getElementById('search_bar_content').value
            if(search_input.length === 0){
                //do nothing
            } else {
                var XML = new XMLHttpRequest();
                XML.onreadystatechange = function () {
                    if (XML.readyState === 4 && XML.status === 200) {
                        //render the autographs
                    }
                };

                XML.open('GET', 'getAuByTag?q='+search_input+'&'+Date.now(), true);
                XML.setRequestHeader("Content-Type", "Text/HTML")
                XML.send();
            }
        }
    </script>
</div>

<main>

    <div class="block3">
        <p>Filters</p>
        <div class="block4">
            <h4>Rang</h4>
            <div class="checkbox">
                <input type="checkbox" id="S"/>
                <label for="S">S</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="A"/>
                <label for="A">A</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="B"/>
                <label for="B">B</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="C"/>
                <label for="C">C</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="D"/>
                <label for="D">D</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="E"/>
                <label for="E">E</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="F"/>
                <label for="F">F</label>
            </div>
        </div>

        <div class="block4">
            <h4>Perioada</h4>
            <div class="checkbox">
                <input type="checkbox" id="2020-prezent"/>
                <label for="2020-prezent">2020-prezent</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="2010-2019"/>
                <label for="2010-2019">2010-2019</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="2000-2009"/>
                <label for="2000-2009">2000-2009</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="1990-1999"/>
                <label for="1990-1999">1990-1999</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="1980-1989"/>
                <label for="1980-1989">1980-1989</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="mai_vechi"/>
                <label for="mai_vechi">mai vechi</label>
            </div>
        </div>

        <a class="button-afisare" href="#">Apply</a>
        <a class="button-afisare" href="/exportCSV" id="exportCSV">Export to CSV</a>
        <a class="button-afisare" href="/exportRSS" id="exportRSS">Export to RSS feed</a>

    </div>
    <?php

    $market_autograph = \core\Application::$app->db->select('autographs', ['marketplace' => "on"], '*');
    ?>
    <div class="autograph-container">


        <?php

        for ($i = 0; $i < count($market_autograph); $i++) {

            echo "
        <div class=\"autograph\">
    <img class=\"autograph__image\" src=\"../uploaded_images/" . $market_autograph[$i]['image'] . "\
                 alt=\"Image failed loading\">
            <h2>" . $market_autograph[$i]['personality'] . "<br>" . $market_autograph[$i]['location'] . "</h2>
            <a class=\"autograph__link\" href=\"/autograph/" . $market_autograph[$i]['id'] . "\">
            <p>View autograph</p>
            </a>
    </div>

    ";
        } ?>


    </div>
</main>
<script><?php require_once("layouts/load_footer.js"); ?></script>

</body>

