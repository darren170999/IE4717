<?php
include('assets/php/connect.php');

$arrangements = isset($_GET['arrangements']) ? $_GET['arrangements'] : null;
$hall_id = isset($_GET['hall_id']) ? $_GET['hall_id'] : null;
$location_id = isset($_GET['location_id']) ? $_GET['location_id'] : null;
$dates = isset($_GET['dates']) ? $_GET['dates'] : null;
$timings = isset($_GET['timings']) ? $_GET['timings'] : null;

if ($arrangements !== null && $hall_id !== null && $dates !== null && $timings !== null && $location_id !== null) {
    // Use the parameters to update data in the "halls" table
    $stmt = $conn->prepare("UPDATE halls SET arrangements = ? WHERE hall_id = ? AND dates = ? AND timings = ? AND location_id = ?");
    $stmt->bind_param("sissi", $arrangements, $hall_id, $dates, $timings, $location_id);
    
    if ($stmt->execute()) {
        // Log success message
        error_log("Data updated successfully");
        echo json_encode(["success" => "Data updated successfully"]);
    } else {
        // Log error message
        error_log("Failed to update data");
        echo json_encode(["error" => "Failed to update data"]);
    }
    
    $stmt->close();
} else {
    // Log missing parameters message
    error_log("Missing parameters");
    echo json_encode(["error" => "Missing parameters"]);
}

$conn->close();
?>
