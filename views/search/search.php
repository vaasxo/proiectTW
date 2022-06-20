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

$data = "k";

if(isset($_GET['q'])){
    $data = $_GET['q'];
}

$sql = "SELECT name FROM tags WHERE name like '$data%'";
$result = $db->query($sql);

if($result){
    $search_results = $result->fetch_assoc();
    echo "<h1>".$search_results['name']."</h1>";
}

