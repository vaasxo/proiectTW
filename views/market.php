<?php
/**
 * @var $this \core\View
 */

$this->title='Marketplace | Signature'?>
<style type="text/css">
    <?php include '../public/css/market.css'; ?>
    <?php include '../public/css/header.css'; ?>
    <?php include '../public/css/footer.css'; ?>
</style>
<body>
<div class="searchbar">
    <div class="searchbar2">
        <input type="text" onkeyup="imu(this.value)" placeholder="Search..">
        <div id="search_content"> result </div>
    </div>
    <script type="text/javascript">
        let content = document.getElementById('search_content');

        function imu(x){
            if(x.length === 0){
                content.innerHTML = 'empty';
            } else {
                var XML = new XMLHttpRequest();
                XML.onreadystatechange = function(){
                    if(XML.readyState === 4 && XML.status === 200){
                        content.innerHTML = XML.responseText
                    }
                };

                XML.open('GET', 'search?q='+x+'&'+Date.now(), true);
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
                <input type="checkbox" id="S" />
                <label for="S">S</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="A" />
                <label for="A">A</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="B" />
                <label for="B">B</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="C" />
                <label for="C">C</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="D" />
                <label for="D">D</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="E" />
                <label for="E">E</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="F" />
                <label for="F">F</label>
            </div>
        </div>

        <div class="block4">
            <h4>Perioada</h4>
            <div class="checkbox">
                <input type="checkbox" id="2020-prezent" />
                <label for="2020-prezent">2020-prezent</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="2010-2019" />
                <label for="2010-2019">2010-2019</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="2000-2009" />
                <label for="2000-2009">2000-2009</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="1990-1999" />
                <label for="1990-1999">1990-1999</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="1980-1989" />
                <label for="1980-1989">1980-1989</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="mai_vechi" />
                <label for="mai_vechi">mai vechi</label>
            </div>
        </div>

        <a class="button-afisare" href="#">Apply</a>
        <a class="button-afisare" href="/exportCSV" id="exportCSV">Export to CSV</a>
        <a class="button-afisare" href="/exportRSS" id="exportRSS">Export to RSS feed</a>

    </div>
    <div class="autograph-container">
        <div class="autograph">
            <img class="autograph__image" src="https://cdn.shopify.com/s/files/1/2030/4039/products/Blanchett_Cate_large.jpg?v=1505155021"
                 alt="Image failed loading">
            <h2>Cate Blanchett<br>27 January 2008</h2>
            <a class="autograph__link" href="autograph.html">
                <p>View autograph</p>
            </a>
        </div>
        <div class="autograph">

            <img class="autograph__image" src="https://xlinegraphics.com/232-large_default/elon-musk-signature.jpg"
                 alt="Image failed loading">
            <h2>Elon Musk<br>11 April 2017</h2>
            <a class="autograph__link" href="autograph.html">
                <p>View autograph</p>
            </a>
        </div>
        <div class="autograph">

            <img class="autograph__image" src="https://cdn.shopify.com/s/files/1/0101/2750/7515/files/signature-neil-armstrong_medium.jpg?v=1584417716"
                 alt="Image failed loading">
            <h2>Neil Armstrong<br>23 February 1987</h2>
            <a class="autograph__link" href="autograph.html">
                <p>View autograph</p>
            </a>
        </div>
        <div class="autograph">

            <img class="autograph__image" src="https://cdn.shopify.com/s/files/1/0101/2750/7515/files/signature-dalai-lama_medium.jpg?v=1584417794"
                 alt="Image failed loading">
            <h2>Dalai Lama 14th<br>6 August 1998</h2>
            <a class="autograph__link" href="autograph.html">
                <p>View autograph</p>
            </a>
        </div>
        <div class="autograph">

            <img class="autograph__image" src="https://www.invaluable.com/blog/wp-content/uploads/sites/77/2018/07/famous-signatures-legibility.jpg" alt="Image failed loading">
            <h2>Andy Warhol<br>July 2018</h2>
            <a class="autograph__link" href="autograph.html">
                <p>View autograph</p>
            </a>
        </div>
        <div class="autograph">

            <img class="autograph__image" src="https://image.invaluable.com/housePhotos/Novartia/89/722689/H20754-L287632162_original.jpg" alt="Image failed loading">
            <h2>Pablo Picasso<br>4 February 1965</h2>
            <a class="autograph__link" href="autograph.html">
                <p>View autograph</p>
            </a>
        </div>
        <div class="autograph">

            <img class="autograph__image" src="https://i.ebayimg.com/images/g/DJ8AAOSwghpe9j7n/s-l1600.jpg" alt="Image failed loading">
            <h2>Angus Young, Brian Johnson, Malcom Young<br>17 July 2014</h2>
            <a class="autograph__link" href="autograph.html">
                <p>View autograph</p>
            </a>
        </div>
    </div>
</main>
<script><?php require_once("layouts/load_footer.js");?></script>

</body>

