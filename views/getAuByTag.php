<?php

$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName     = "proiecttw";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$tag = $_GET['q'];

$tagID = $db->query("SELECT id FROM tags WHERE name like '$tag'");

$tags = array();

while(($row = $tagID->fetch_assoc())) {
    $tags[] = $row['id'];
}
$array = implode("','",$tags);

$AuID = $db->query("SELECT autograph_id FROM autograph_tags WHERE tag_id IN('".$array."') ");

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