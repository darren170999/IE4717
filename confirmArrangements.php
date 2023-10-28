<?php
include('assets/php/connect.php');


$arrangements = isset($_GET['arrangements']) ? $_GET['arrangements'] : null;
$hall_id = isset($_GET['hall_id']) ? $_GET['hall_id'] : null;
$dates = isset($_GET['dates']) ? $_GET['dates'] : null;
$timings = isset($_GET['timings']) ? $_GET['timings'] : null;

if ($arrangements !== null && $hall_id !== null && $dates !== null && $timings !== null) {
    // Use the parameters to update data in the "halls" table
    $stmt = $conn->prepare("UPDATE halls SET arrangements = ? WHERE hall_id = ? AND dates = ? AND timings = ?");
    $stmt->bind_param("siss", $arrangements, $hall_id, $dates, $timings);
    if ($stmt->execute()) {
        echo json_encode(["success" => "Data updated successfully"]);

    } else {
        echo json_encode(["error" => "Failed to update data"]);
    }
    $stmt->close();
} else {
    // Required parameters are missing
    echo json_encode(["error" => "Missing parameters"]);
}


$conn->close();
?>
