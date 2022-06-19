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

header("Content-type: text/xml");

echo "<?xml version='1.0' encoding='UTF-8'?>
 <rss version='2.0'>
 <channel>
 <title>Signature | RSS</title>
 <link>https://www.signature.com/</link>
 <description>Cloud RSS</description>
 <language>en-us</language>";

while ($row = mysqli_fetch_array($query)) {
    $id = $row["id"];
    $personality = $row["personality"];
    $field = $row["field"];
    $context = $row["context"];
    $location = $row["location"];
    $object = $row["object"];
    $mentions = $row["mentions"];
    $measures = $row["measures"];
    $estimated_value = $row["estimated_value"];

    echo "<item>
   <id>$id</id>
   <personality>$personality</personality>
   <field>$field</field>
   <context>$context</context>
   <location>$location</location>
   <object>$object</object>
   <mentions>$mentions</mentions>
   <measures>$measures</measures>
   <estimated_value>$estimated_value</estimated_value>
   </item>";
}
echo "</channel></rss>";