<?php
include("connect.php"); // รวมไฟล์สำหรับเชื่อมต่อฐานข้อมูล

$sql = 'SELECT * FROM movie';
$result = $mysqli->query($sql);

// ตรวจสอบผลลัพธ์จากการ query
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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

                        <div class="remember-forgot">
                            <label><input type="checkbox">Remember Me</label>
                            <a href="#">Forgot password?</a>
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
            <div class="slide" style="background-image: url('img/chihiro042.jpg');">
                <div class="banner-info">
                    <h1>Spirited Away</h1>
                    <p>แฟนตาซี </p>
                    <button>สตรีมเลย</button>
                </div>
            </div>
            <div class="slide" style="background-image: url('img/totoro029.jpg');">
                <div class="banner-info">
                    <h1>My Neighbor Totoro</h1>
                    <p>เรื่องราวที่น่าติดตามของภาพยนตร์ใหม่ที่ทุกคนรอคอย</p>
                    <button>สตรีมเลย</button>
                </div>
            </div>
            <div class="slide" style="background-image: url('img/ponyo008.jpg');">
                <div class="banner-info">
                    <h1>My Neighbor Totoro</h1>
                    <p>เรื่องราวที่น่าติดตามของภาพยนตร์ใหม่ที่ทุกคนรอคอย</p>
                    <button>สตรีมเลย</button>
                </div>
            </div>
            <!-- เพิ่มสไลด์ -->
        </div>
        <button class="prev" onclick="prevSlide()">&#10094;</button>
        <button class="next" onclick="nextSlide()">&#10095;</button>
    </div>
    <script src="js/script.js"></script>
    </div>


    <div class="container">

        <?php
        //ตรวจสอบว่ามีข้อมูลหรือไม่
        if ($result->num_rows > 0) {
            //วนลูปเพื่อแสดงผลข้อมูล
            while ($p = $result->fetch_object()) {
                // ตรวจสอบคุณสมบัติ
                if (isset($p->movie_name)) {

                    $n = $p->movie_name;
                    $images = explode(',', $p->img);
                    $src = "img/$p->id/{$images[0]}";
                    $type = $p->type;
                    $rate = $p->rate;
                    $synopsis = $p->synopsis;

                    echo "<div class='movie-list'>";


                    echo "<div class='movie-name'>";
                    echo "<img src='$src' alt='$n'>";
                    echo "</div>";

                    echo "<div class='movie-info'>";
                    echo "<h3>$n</h3>";
                    echo "<div class='btt'>";
                    echo "<a href='index.html'>View Details</a>";

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



</body>

</html>