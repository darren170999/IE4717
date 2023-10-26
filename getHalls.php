<?php
// Database connection settings (same as in the upload script)
include('assets/php/connect.php');

// Get parameters from the URL
$hall_id = isset($_GET['hall_id']) ? $_GET['hall_id'] : null;
$dates = isset($_GET['dates']) ? $_GET['dates'] : null;
$timings = isset($_GET['timings']) ? $_GET['timings'] : null;

// Check if all required parameters are present
if ($hall_id !== null && $dates !== null && $timings !== null) {
    // Use the parameters to fetch data from the "halls" table
    $stmt = $conn->prepare("SELECT arrangements FROM halls WHERE hall_id = ? AND dates = ? AND timings = ?");
    $stmt->bind_param("iss", $hall_id, $dates, $timings);
    $stmt->execute();
    $stmt->bind_result($arrangements);

    if ($stmt->fetch()) {
        // Data found, return it (e.g., as JSON)
        $result = [
            "arrangements" => $arrangements,
        ];
        echo json_encode($result);
    } else {
        // Data not found
        echo json_encode(["error" => "Data not found"]);
    }

    $stmt->close();
} else {
    // Required parameters are missing
    echo json_encode(["error" => "Missing parameters"]);
}

$conn->close();
?>
