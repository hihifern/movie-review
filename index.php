<?php
include("connect.php");
$sql = 'SELECT * FROM movie';
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . $mysqli->error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Reviews</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-color: rgb(50, 62, 131);
            background-color: #000;
        }
    </style>

</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logo">
                <h1>Movie</h1>
            </div>

            <ul class="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="reviews.php">Reviews</a></li>
                <li><a href="#">Top Movies</a></li>
                <li><a href="#">Contact</a></li>
            </ul>

            <div class="user">
                <a href="#" id="loginBtn"><img src="img/aa/icons8-user-30.png"> Login/Sign up</a>
                <!-- <button id="loginBtn">Login</button> -->
            </div>
            <div id="loginModal" class="modal">
                <div class="frombox-login">
                    <span class="close">&times;</span>
                    <h2>Login</h2>
                    <form action="process_login.php" method="post">
                        <div class="input-box">
                            <input type="text" name="username" placeholder="uesrname" required>
                            <!-- <i class='bx bx-user'></i> -->
                        </div>
                        <div class="input-box">
                            <input type="password" name="password" placeholder="password" required>
                            <!-- <i class='bx bx-lock-alt' ></i> -->
                        </div>


                        <button type="submit">Login</button>
                        <div class="register-link">
                            <p>Don't have an account?
                                <a href="#"> Register</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>


            <script src="js/login.js"></script>
        </div>
        </div>

    </nav>
    <div class="banner">
        <div class="slides">
            <div class="slide" style="background-image: url('img/spider02.jpg');">
                <div class="banner-info">
                    <h1>Spider-Man: Into the Spider-Verse</h1>
                    <div class="banner-type">
                        <p>Animation</p>
                        <p>Action</p>
                        <p>Adventure</p>
                    </div>
                    <button>สตรีมเลย</button>
                </div>
            </div>
            <div class="slide" style="background-image: url('img/wonka.png');">
                <div class="banner-info">
                    <h1>Wonka</h1>
                    <div class="banner-type">
                        <p>Animation</p>
                        <p>Action</p>
                        <p>Adventure</p>
                    </div>
                    <button>สตรีมเลย</button>
                </div>
            </div>
            <div class="slide" style="background-image: url('img/ponyo008.jpg');">
                <div class="banner-info">
                    <h1>My Neighbor Totoro</h1>
                    <div class="banner-type">
                        <p>Animation</p>
                        <p>Action</p>
                        <p>Adventure</p>
                    </div>
                    <button>สตรีมเลย</button>
                </div>
            </div>
            <!-- เพิ่มสไลด์ -->
        </div>
        <button class="prev" onclick="prevSlide()">&#10094;</button>
        <button class="next" onclick="nextSlide()">&#10095;</button>
    </div>
    <!-- <script src="js/script.js"></script> -->
    </div>


    <div class="container">
        <div class='topic'>
            <h3>TOP 10</h3>
            <hr>
        </div>
        <div class="list">
            <?php


            //ตรวจสอบว่ามีข้อมูลหรือไม่
            if ($result->num_rows > 0) {
                // วนลูปเพื่อแสดงผลข้อมูล
                while ($p = $result->fetch_object()) {
                    // ตรวจสอบคุณสมบัติ
                    if (isset($p->movie_name)) {
                        $n = $p->movie_name;
                        $images = explode(',', $p->img);
                        $src = "img/$p->id/{$images[0]}";
                        $type = $p->type;
                        $rate = $p->rate;
                        $synopsis = $p->synopsis;
                        $det = $p->details_link;


                        // while ($p = $result->fetch_object()) {
                        //     $moviesByType[$p->type][] = [
                        //         'id' => $p->id,
                        //         'name' => $p->movie_name,
                        //         'img' => $p->img,
                        //         'rate' => $p->rate,
                        //         'synopsis' => $p->synopsis,
                        //         'details_link' => $p->details_link
                        //     ];
                        // }

                        echo "<div class='movie-list'>";
                        echo "<div class='movie-name'>";
                        echo "<img src='$src' alt='$n'>";
                        echo "</div>";

                        echo "<div class='movie-info'>";
                        echo "<h3>$n</h3>";

                        echo "<div class='btt'>";
                        echo "<a href='$det'>View Details</a>";
                        echo "</div>";
                        echo "</div>";

                        echo "</div>";
                    } else {
                        echo "<p>Movie name not found: $p->id</p>";
                    }
                }
            } else {
                echo "<p>No movies found in the database.</p>";
            }
            ?>

        </div>
        <!-- แสดงหนังตามtype -->
        <div class='topic'>
            <h3>ANIME</h3>
            <hr>
        </div>
        <div class="list-type">

            <?php

            $movies = "SELECT * FROM `movie` WHERE `type` IN ('anime')";
            $query_movies = mysqli_query($conn, $movies);
            $result_movies = mysqli_fetch_assoc($query_movies);

            while ($result_movies = mysqli_fetch_assoc($query_movies)) {

                $title = $result_movies['movie_name'];
                $image_id = $result_movies['id']; // ID ของรูปภาพ
                $image_filename = $result_movies['img']; // ชื่อไฟล์ของรูปภาพ
                $src_img = "img/$image_id/$image_filename";

                echo "<div class='movie-list'>";
                echo "<div class='movie-name'>";
 
                echo "<h2>$title</h2>";
                echo "<img src='$src_img' alt='$title' style='max-width: 200px; height: auto;'><br>";
 echo "<div class='movie-info'>";
              
                // echo $result_movies['img'];
                echo "</div>";

                echo "</div>";

              
                // echo $result_movies['movie_name'];

                // echo "<div class='btt'>";
                // echo "<a href='$det'>View Details</a>";
                // echo "</div>";
                echo "</div>";

                // echo $result_movies['type'];
            }

            ?>

        </div>
    </div>




</body>

</html>