<?php
$mysqli = new mysqli('localhost', 'root', '', 'movie-review');

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
