<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Show errors (for debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database credentials
$host = '172.31.23.222'; // Database PRIVATE IP
$dbname = 'instacart';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}


// Getting multiple items (new)
$items = isset($_GET['items']) ? json_decode($_GET['items'], true) : [];

// Getting single item (your original)
$item = isset($_GET['item']) ? $conn->real_escape_string($_GET['item']) : '';

$data = ["items" => []];



// Build SQL query based on input
if (!empty($items)) {
    // User gave multiple items
    $escaped_items = array_map(function($i) use ($conn) {
        return "'" . strtolower($conn->real_escape_string(trim($i))) . "'";
    }, $items);
    $itemList = implode(",", $escaped_items);
    $sql = "SELECT * FROM quality_reports WHERE LOWER(item) IN ($itemList)";
} elseif ($item !== '') {
    // User gave one item
    $sql = "SELECT * FROM quality_reports WHERE LOWER(item) LIKE LOWER('%$item%')";
} else {
    // User gave nothing, show everything
    $sql = "SELECT * FROM quality_reports";
}



//execute query
$result = $conn->query($sql);


if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data["items"][] = $row;
    }
}

echo json_encode($data);
$conn->close();
?>

