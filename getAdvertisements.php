<?php
// Database connection settings (same as in the upload script)
include('assets/php/connect.php');

$stmt = $conn->prepare("SELECT image_data, image_name FROM advertisements");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($image_data, $image_name);

$images = array(); // Create an array to hold image data
while ($stmt->fetch()) {
    $images[] = array(
        "name" => $image_name,
        "data" => base64_encode($image_data)
    );
}
echo json_encode($images); // Must do this to return the array of image data as JSON

$stmt->close();
$conn->close();
?>
