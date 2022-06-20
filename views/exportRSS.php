<?php
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "proiecttw";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Fetch records from database
$query = $db->query("SELECT id, personality, context FROM autographs");

header("Content-type: text/xml");

echo "<?xml version='1.0' encoding='UTF-8'?>
<rss version='2.0'>
<channel>
<title>Signature</title>
<link>https://signature.com </link>
<description>Autograph collection</description>
<language>en-us</language>";

while($row = $query->fetch_array())
{
    $title=$row['personality'];
    $link="https://www.signature.com/autographs/{$row['id']}";
    $description=$row['context'];

    echo "<item>
<title>$title</title>
<link>$link</link>
<description>$description</description>
</item>";
}
echo "</channel></rss>";
