<?php
include("connect.php");

// รับข้อมูลจากฟอร์ม
$movie_name = $_POST['movie_name'];
$movie_details = $_POST['movie_details'];
$user_id = 1; // สมมติว่า user_id คือ 1

// ตรวจสอบว่ามีหนังนี้อยู่ใน Watchlist แล้วหรือยัง
$sql_check = "SELECT * FROM watchlist WHERE movie_name = ? AND user_id = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("si", $movie_name, $user_id);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows > 0) {
    echo "This movie is already in your Watchlist.";
} else {
    // เพิ่มหนังลงใน Watchlist
    $sql = "INSERT INTO watchlist (user_id, movie_name, movie_details ) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $movie_name, $movie_details, $user_id);

    if ($stmt->execute()) {
        echo "Movie added to Watchlist!";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$conn->close();
?>
