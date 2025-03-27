<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // Allow all origins
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

// Database connection
$conn = new mysqli("localhost", "root", "Avi94174", "Users");

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed: " . $conn->connect_error]));
}

// Fetch data from 'clients' table
$sql = "SELECT * FROM clients";
$result = $conn->query($sql);

$clients = [];
while ($row = $result->fetch_assoc()) {
    $clients[] = $row;
}

// Return JSON response
echo json_encode($clients, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
$conn->close();
?>