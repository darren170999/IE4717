<?php
include('assets/php/connect.php');

// Get the current date
$currentDate = date('Y-m-d');

// Calculate the date 7 days from today
$endDate = date('Y-m-d', strtotime('+7 days', strtotime($currentDate)));

$stmt = $conn->prepare("SELECT m.movie_id, m.movie_title, m.sypnopsis, m.casts, m.screening_date, m.price, m.ratings, m.hall_id, m.location_id, mp.movie_data, mp.movie_name
FROM movies m
INNER JOIN moviePosters mp ON m.movie_id = mp.movie_id
WHERE m.screening_date >= ? AND m.screening_date < ?;");
$stmt->bind_param("ss", $currentDate, $endDate);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($movie_id, $movie_title, $sypnopsis, $casts, $screening_date, $price, $ratings,$hall_id, $location_id, $movie_data, $movie_name);

$movies = array();

if ($stmt->execute()) {
    $stmt->store_result();
    $stmt->bind_result($movie_id, $movie_title, $sypnopsis, $casts, $screening_date, $price, $ratings, $hall_id, $location_id, $movie_data, $movie_name);

    $movies = array();

    while ($stmt->fetch()) {
        $formattedDate = date('l', strtotime($screening_date)); // Get the day of the week
        $movie = array(
            "movie_id" => $movie_id,
            "movie_title" => $movie_title,
            "sypnopsis" => $sypnopsis,
            "casts" => $casts,
            "screening_date" => $screening_date,
            "days" => $formattedDate, //Map day based on date
            "price" => $price,
            "ratings" => $ratings,
            "hall_id" => $hall_id,
            "location_id" => $location_id,
            "movie_data" => base64_encode($movie_data),
            "movie_name" => $movie_name
        );

        // Store the movies in the array
        $movies[] = $movie;
    }

    echo json_encode($movies);
} else {
    echo "Error: " . $stmt->error; // Output any MySQL errors
}

$stmt->close();
$conn->close();

?>
