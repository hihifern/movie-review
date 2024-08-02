<?php
// $mysqli = new mysqli('localhost', 'root', '', 'movie-review');
$conn = mysqli_connect('localhost', 'root', '', 'movie-review');


if ($conn->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
