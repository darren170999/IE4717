<?php 
include('assets/php/connect.php'); 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$username = isset($_GET['username']) ? $_GET['username'] : null;
$newUsername = isset($_GET['newUsername']) ? $_GET['newUsername'] : null;
$email = isset($_GET['email']) ? $_GET['email'] : null;
$contact = isset($_GET['contact']) ? $_GET['contact'] : null;

$stmt = $conn->prepare("UPDATE users SET username=?, email = ?, contact= ?  WHERE username = ?");
$stmt->bind_param("ssis", $newUsername, $email, $contact, $username);
if ($stmt->execute()) {
    $_SESSION["valid_user"] = $newUsername;
    echo json_encode(["success" => "Data updated successfully"]);
} else {
    echo json_encode(["error" => "Failed to update data"]);
}
$stmt->close();
$conn->close();
?>