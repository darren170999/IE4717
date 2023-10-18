<?php
include('assets/php/connect.php');

$stmt = $conn->prepare("SELECT m.movie_id, m.movie_title, m.sypnopsis, m.casts, m.weekDays, m.screening_time, m.price, m.ratings, mp.movie_data, mp.movie_name
FROM movies m
INNER JOIN moviePosters mp ON m.movie_id = mp.movie_id;");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($movie_id, $movie_title, $sypnopsis, $casts, $weekDays, $screening_time, $price, $ratings, $movie_data, $movie_name);

$movies = array();

while ($stmt->fetch()) {
    $movie = array(
        "movie_id" => $movie_id,
        "movie_title" => $movie_title,
        "sypnopsis" => $sypnopsis,
        "casts" => $casts,
        "weekDays" => $weekDays,
        "screening_time" => $screening_time,
        "price" => $price,
        "ratings" => $ratings,
        "movie_data" => base64_encode($movie_data),
        "movie_name" => $movie_name
    );

    // Filter movies by the day and add them to the respective day container
    $day = strtolower(date('l', strtotime($weekDays))); // Get the day of the week
    $movies[$day][] = $movie;
}

echo json_encode($movies); 

$stmt->close();
$conn->close();
?>
