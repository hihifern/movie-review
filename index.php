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
    <link rel="stylesheet" href="css/style.css"> <!-- รวมไฟล์ CSS -->
</head>

<body>
    <nav>
        <div class="logo">
            <h1>Movie</h1>
        </div>
        <div class="navbar">
            <ul class="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Reviews</a></li>
                <li><a href="#">Top Movies</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="user">
            <a href="register.php"><img src="img/aa/icons8-user-30.png" alt=""> Login/Sign up</a>
        </div>
    </nav>


    <div class="banner">

        <div class="banner-text">
            <h2>HAIKYU!! The Dumpster Battle</h2>
            <p>Animation, Comedy, Drama</p>
            <p>lorem100

            </p>
            <a href="#">GET TICKET</a>
          
                <a href="#">View Det</a>
           

        </div>
    </div>


    <div class="container">



        <?php
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        if ($result->num_rows > 0) {
            // วนลูปเพื่อแสดงผลข้อมูลภาพยนตร์
            while ($p = $result->fetch_object()) {
                // ตรวจสอบว่าคุณสมบัติ movie มีอยู่หรือไม่
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
                    <label>First Name</label>
                    <input type="text" placeholder="First Name">
                    <label>Last Name</label>
                    <input type="text" placeholder="First Name">
                    <label>First Name</label>
                    <input type="text" placeholder="First Name">
                </form>
            </div>
        </div>
    </div>
</body>

</html>