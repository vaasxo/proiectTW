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
$query = $db->query("SELECT id, personality, field, context, location, object, mentions, measures, estimated_value FROM autographs");

header( "Content-type: text/xml");

echo "<?xml version='1.0' encoding='UTF-8'?>
 <rss version='2.0'>
 <channel>
 <title>w3schools.in | RSS</title>
 <link>https://www.w3schools.in/</link>
 <description>Cloud RSS</description>
 <language>en-us</language>";

while($row = mysqli_fetch_array($query)){
    $title=$row["title"];
    $link=$row["link"];
    $description=$row["description"];

    echo "<item>
   <title>$title</title>
   <link>$link</link>
   <description>$description</description>
   </item>";
}
echo "</channel></rss>";
