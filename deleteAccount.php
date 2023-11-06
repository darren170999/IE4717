<?php
include('assets/php/connect.php');

if (isset($_POST["deleteAccountButton"])) {
    if (empty($_POST['delConfirmUsername']) || empty($_POST['delConfirmPassword'])) {
        echo "All records must be filled in";
        exit;
    }

    $username = $_POST['delConfirmUsername'];
    $enteredPassword = $_POST['delConfirmPassword'];

    $query = "SELECT password FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($storedHashedPasswordFromDB);
    $stmt->fetch();

    if (password_verify($enteredPassword, $storedHashedPasswordFromDB)) {
        // Must close the previous statement first
        $stmt->close(); 

        $delQuery = "DELETE FROM users WHERE username = ?";
        $stmt = $conn->prepare($delQuery);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        session_start();

        $_SESSION = array();
        
        session_destroy();
        
        header("Location: loginSignUp.php");
        exit();
    } else {
        echo "You are an imposter!";
    }

    $stmt->close();
}

$conn->close();
?>
