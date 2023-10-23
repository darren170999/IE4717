<?php
include('assets/php/connect.php');
session_start();

if (isset($_POST["signin"])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        echo "All records must be filled in";
        exit;
    }

    $username = $_POST['username'];
    $enteredPassword = $_POST['password'];

    $query = "SELECT password FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($storedHashedPasswordFromDB);
    $stmt->fetch();

    if (password_verify($enteredPassword, $storedHashedPasswordFromDB)) {
        $_SESSION["valid_user"] = $username;
        header("Location: index.php");
        echo "Login successful.";
    } else {
        echo "Login failed. Incorrect username or password.";
    }

    $stmt->close();
}

$conn->close();
?>
