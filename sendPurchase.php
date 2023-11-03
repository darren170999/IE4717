<?php
include('assets/php/connect.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
$arrangements = isset($_GET['arrangements']) ? $_GET['arrangements'] : null;
$hall_id = isset($_GET['hall_id']) ? $_GET['hall_id'] : null;
$location_id = isset($_GET['location_id']) ? $_GET['location_id'] : null;
$dates = isset($_GET['dates']) ? $_GET['dates'] : null;
$timings = isset($_GET['timings']) ? $_GET['timings'] : null;

$username = isset($_GET['username']) ? $_GET['username'] : "Guest";
$total = isset($_GET['total']) ? $_GET['total'] : null;

if ($username !== null && $total !== null){
    // Fetch user's contact and email
    $stmt = $conn->prepare("SELECT contact, email FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    if ($stmt->execute()) {
        // Log success message
        error_log("Fetch users successful");
    
        // Bind the result variables
        $stmt->bind_result($contact, $email);
    
        // Fetch the user data
        $stmt->fetch();
        // echo("Contact: " . $contact);
        // echo("Email: " . $email);
        $stmt->close();
        // Now, you have the user's contact, email, and amount, and you can proceed with the INSERT operation
        $stmt = $conn->prepare('INSERT INTO sales (user_name, contact, email, total) VALUES (?, ?, ?, ?)');
    
        $stmt->bind_param("sisd", $username, $contact, $email, $total);
        
        echo ("Inserting into sales table:");
        echo("Username: " . $username);
        echo("Total: " . $total);
    
        if ($stmt->execute()) {
            echo json_encode(["success" => "Data updated successfully"]);
        } else {
            echo json_encode(["error" => "Failed to update data"]);
        }
    } else {
        // Log error message
        echo json_encode(["error" => "Failed to update data"]);
        // echo json_encode(["error" => "Failed to fetch user data"]);
    }
    $stmt->close();

} else {
    // Log missing parameters message
    echo json_encode(["error" => "Failed to update data"]);
}

$conn->close();
?>
