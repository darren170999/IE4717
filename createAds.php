<?php
include('assets/php/connect.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Check if a file was submitted
if (isset($_POST["submit"])) {
    $image_name = $_FILES["fileToUpload"]["name"];
    $image_data = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);

    $stmt = $conn->prepare("INSERT INTO advertisements (image_data, image_name) VALUES (?, ?)");
    $stmt->bind_param("ss", $image_data, $image_name);
    if ($stmt->execute()) {
        echo "Image uploaded successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
