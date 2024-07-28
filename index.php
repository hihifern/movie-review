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
            <a href="register.php"><img src="img/aa/icons8-user-30.png" alt=""> Login/Sign up</a>
        </div>
        </div>
       
    </nav>
    <div class="banner">
        <div class="slides">
            <!-- <div class="slide" style="background-image: url('pt1.jpg');">
                <div class="banner-info">
                    <h1>Harry Potter and the Philosopher's Stone</h1>
                    <p>แฟนตาซี · Natalie Portman และ Moses Ingram ประชันบทบาทเข้มข้นในผลงานฟิล์มนัวร์สุดระทึก</p>
                    <button>สตรีมเลย</button>
                </div>
            </div> -->
            <div class="slide" style="background-image: url('banner.jpg');">
                <div class="banner-info">
                    <h1>ANOTHER MOVIE</h1>
                    <p>เรื่องราวที่น่าติดตามของภาพยนตร์ใหม่ที่ทุกคนรอคอย</p>
                    <button>สตรีมเลย</button>
                </div>
            </div>
            <!-- เพิ่มสไลด์อื่นๆ ตามต้องการ -->
        </div>
        <button class="prev" onclick="prevSlide()">&#10094;</button>
        <button class="next" onclick="nextSlide()">&#10095;</button>
    </div>
    <script src="script.js"></script>
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

    <div class="overlay" id="divOne">
        <div class="wrapper">
            <h2>Register</h2>
            <a href="#" class="close">&times;</a>
            <div class="content">
                <form>
                    <label>username</label>
                    <input type="text" placeholder="username">
                    <label>email</label>
                    <input type="text" placeholder="email">
                    <label>password</label>
                    <input type="text" placeholder="password">
                </form>
            </div>
        </div>
    </div>
</body>

</html>