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
$query = $db->query("SELECT id, personality, field, context, location, object, mentions, measures, price FROM autographs");

if ($query->num_rows > 0) {
    $delimiter = ",";
    $filename = "autographs-data_" . date('Y-m-d') . ".csv";

    // Create a file pointer
    $f = fopen('php://memory', 'w');

    // Set column headers
    $fields = array('ID', 'PERSONALITY', 'FIELD', 'CONTEXT', 'LOCATION', 'OBJECT', 'MENTIONS', 'MEASURES', 'price');
    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as csv and write to file pointer
    while ($row = $query->fetch_assoc()) {
        $lineData = array($row['id'], $row['personality'], $row['field'], $row['context'], $row['location'], $row['object'], $row['mentions'], $row['measures'], $row['price']);
        fputcsv($f, $lineData, $delimiter);
    }

    $fields = array('PERSONALITY', 'NUM_AUTOGRAPHS');
    fputcsv($f, $fields, $delimiter);

    $personalities = $db->query("SELECT personality ,COUNT(*) AS total FROM autographs GROUP BY personality ORDER BY COUNT(*) DESC");

    while ($row = $personalities->fetch_assoc()) {
        $lineData = array($row['personality'], $row['total']);
        fputcsv($f, $lineData, $delimiter);
    }

    // Move back to beginning of file
    fseek($f, 0);

    // Set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;