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

$data = $_GET['q'];

$sql = "SELECT 'ads' FROM tags";

$result = $db->query($sql);

if($result){
    $search_results = $result->fetch_assoc();
}
echo $search_results['name'] ?? "no results";
