<?php
include('assets/php/connect.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST["submit"])) {
    if(empty($_POST['username']) || empty($_POST['password'])) {
        echo "All records to be filled in";
        exit;
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $created_at = date('Y-m-d');
    
    if($password != $password2) {
        echo "Sorry password must be the same";
        exit;
    
    }
    
    $password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, password, email, contact, created_at) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $username, $password, $email, $contact, $created_at);
    
    if ($stmt->execute()) {
        echo "account was successfully recorded.";
        header("Location: loginSignUp.php");
        exit;
    } else {
    
        echo "Failed to record the account.";
    }
    
    $stmt->close();
}
$conn->close();


?>