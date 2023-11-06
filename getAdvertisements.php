<?php
include('assets/php/connect.php');

$stmt = $conn->prepare("SELECT image_data, image_name FROM advertisements");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($image_data, $image_name);

$images = array();
while ($stmt->fetch()) {
    $images[] = array(
        "name" => $image_name,
        "data" => base64_encode($image_data)
    );
}
echo json_encode($images);

$stmt->close();
$conn->close();
?>
