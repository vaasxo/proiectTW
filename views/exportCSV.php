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

// Fetch records from database
$query = $db->query("SELECT id, personality, field, context, location, object, mentions, measures, estimated_value FROM autographs");

if ($query->num_rows > 0) {
    $delimiter = ",";
    $filename = "members-data_" . date('Y-m-d') . ".csv";

    // Create a file pointer
    $f = fopen('php://memory', 'w');

    // Set column headers
    $fields = array('ID', 'PERSONALITY', 'FIELD', 'CONTEXT', 'LOCATION', 'OBJECT', 'MENTIONS', 'MEASURES', 'ESTIMATED_VALUE');
    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as csv and write to file pointer
    while ($row = $query->fetch_assoc()) {
        $lineData = array($row['id'], $row['personality'], $row['field'], $row['context'], $row['location'], $row['object'], $row['mentions'], $row['measures'], $row['estimated_value']);
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