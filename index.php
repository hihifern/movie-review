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

    </style>

</head>

<body>
    <header>
        <nav class="top-navbar">

            <li>
                <a href="#">
                    <i class='bx bx-search'></i>
                    <input type="text" placeholder="search">
                </a>
                <!-- <span class="tooltip">hello</span> -->
            </li>


            <div class="user">
                <a href="#" id="loginBtn">
                    <i class='bx bxs-user'> Login/Sign up</i>
                </a>
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
        </nav>
    </header>



    </div>

    <nav class="navbar-side">
        <div class="logo-content">
            <div class="logo">MOVIE4ME </div>
        </div>


        <ul class="menu">

            <li>
                <a href="#">
                    <i class='bx bx-user'></i>
                    <span class="link-name">User</span>
                </a>

            </li>
            <li>
                <a href="#">
                    <i class='bx bx-calendar-week'></i>
                    <span class="link-name">Vote</span>
                </a>

            </li>
            <li>
                <a href="#">
                    <i class='bx bx-movie-play'></i>
                    <span class="link-name">Movie List</span>
                </a>

            </li>


            <li>
                <a href="#">
                    <i class='bx bx-list-plus'></i>
                    <span class="linl-list">My List</span>

                </a>
            </li>

        </ul>

    </nav>



    <!-- <div class="banner">
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
    </div> 
    <script src="js/script.js"></script>

    <main>
        <div class="container">
            <div class="movie-topic">
                <div class='topic'>
                    <h3>TOP 10</h3>
                    <hr>
                </div>
                <div class="list">
                    
                        <?php
                        if ($result->num_rows > 0) {
                            // วนลูปเพื่อแสดงผลข้อมูล
                            while ($p = $result->fetch_object()) {
                                if (isset($p->movie_name)) {
                                    $n = $p->movie_name;
                                    $images = explode(',', $p->img);
                                    $src = "img/$p->id/{$images[0]}";
                                    $type = $p->type;
                                    $rate = $p->rate;
                                    $synopsis = $p->synopsis;
                                    $det = $p->details_link;


                                    echo "<div class='slide-movie'>";
                                    echo "<div class='movie-list'>";
                                    echo "<div class='movie-name'>";
                                    echo "<img src='$src' alt='$n'>";
                                    echo "</div>";

                                    echo "<div class='movie-info'>";
                                    echo "<a href='$det'>$n</a>";
                                    echo "</div>";

                                    echo "</div>";
                                    echo "</div>";
                                } else {
                                    echo "<p>Movie name not found</p>";
                                }
                            }
                        } else {
                            echo "<p>No movies found in the database.</p>";
                        }
                        ?>
                 
                </div>
                <button class="prev" onclick="prevSlide()">&#10094;</button>
                <button class="next" onclick="nextSlide()">&#10095;</button>
            </div>
            <script src="js/movielist.js"></script>



            <!-- แสดงหนังตามtype -->
            <!-- <div class="movie-topic">
                <div class='topic'>
                    <h3>ANIME</h3>
                    <hr>
                </div>
                <div class="list">

                    <?php include 'movie-type/movie-type.php'; ?>

                </div>
            </div>


            <div class="movie-topic">
                <div class='topic'>
                    <h3>Studio Ghibli</h3>
                    <hr>
                </div>
                <div class="list-GB">
                    <?php include 'movie-type/GB-type.php'; ?>

                </div>
            </div>
        </div> -->

    </main>

</body>

</html>