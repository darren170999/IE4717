<?php
// Database connection settings (same as in the upload script)
include('assets/php/connect.php');

if (isset($_GET['selectedMovieName'])) { // Check for the query parameter
    $title = $_GET['selectedMovieName'];

    $stmt = $conn->prepare("SELECT m.movie_id, m.movie_title, m.sypnopsis, m.casts, m.screening_date, m.price, m.ratings, m.hall_id, mp.movie_data, mp.movie_name
    FROM movies m
    INNER JOIN longPosters mp ON m.movie_id = mp.movie_id
    WHERE m.movie_title = ?");
    $stmt->bind_param("s", $title);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($movie_id, $movie_title, $sypnopsis, $casts, $screening_date, $price, $ratings, $hall_id, $movie_data, $movie_name);
    $selectedMovie = array(); // Create an array to hold image data

    while ($stmt->fetch()) {
        $formattedDate = date('l', strtotime($screening_date));
        $selectedMovie[] = array(
            "movie_id" => $movie_id,
            "movie_title" => $movie_title,
            "sypnopsis" => $sypnopsis,
            "casts" => $casts,
            "screening_date" => $screening_date,
            "days" => $formattedDate, // Map day based on date
            "price" => $price,
            "ratings" => $ratings,
            "hall_id" => $hall_id,
            "movie_data" => base64_encode($movie_data),
            "movie_name" => $movie_name
        );
    }
    echo json_encode($selectedMovie); // Return the array of image data as JSON

    $stmt->close();
} else {
    echo "No selectedMovieName provided.";
}

$conn->close();
?>
