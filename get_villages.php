<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "location_dynamic";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$district_id = $_GET['district_id'];
$stmt = $conn->prepare("SELECT id, name FROM villages WHERE district_id = ?");
$stmt->bind_param("i", $district_id);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$stmt->close();
$conn->close();
?>
