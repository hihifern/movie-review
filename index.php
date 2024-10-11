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

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>

    </style>

</head>

<body>
    <header>
        <nav class="top-navbar">
            <ul class="left-menu">

            </ul>
            <ul class="right-menu">
                <li>
                    <a href="#">
                        <i class='bx bx-search'></i>
                        <input type="text" placeholder="search">
                    </a>
                    <!-- <span class="tooltip">hello</span> -->
                </li>

                <div class="user">
                    <a href="#" id="loginBtn">
                        Login/Sign up</i>
                    </a>
                </div>

        </nav>
    </header>



    </div>

    <nav class="navbar-side">


        <ul class="menu">
            <div class="logo-content">
                <div class="logo">
                    <a href="#">MOVIE4ME</a>
                </div>
            </div>
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
        <hr>
        <h1>FRIENDS</h1>

    </nav>

    <script src="js/script.js"></script>

    <main>

        <div class="banner">
            <div class="slide" style="background-image: url('img/kimitachi010.jpg');">
                <div class="banner-info">
                    <h1>The Boy and the Heron</h1>
                    <div class="banner-type">
                        <p>Animation</p>
                        <p>Fantasy</p>
                        <p>Adventure</p>
                    </div>

                </div>
            </div>
        </div>
        <script src="js/navbar.js"></script>

        <div class="container">

            <div class="movie-topic">
                <div class='topic'>
                    <h3>MOST REVIEW</h3>
                    <p>from your friends</p>
                </div>
                <hr>

                <div class="list">

                    <?php
                    if ($result->num_rows > 0) {
                        // วนลูปเพื่อแสดงผลข้อมูล
                        while ($p = $result->fetch_object()) {
                            if (isset($p->movie_name)) {
                                $n = $p->movie_name;
                                $images = explode(',', $p->img);
                                $src = "img/$p->movie_id/{$images[0]}";
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
            </div>
            <script src="js/movielist.js"></script>



            <!-- แสดงหนังตามtype -->
            <div class="movie-topic">
                <form action="add_to_watchlist.php" method="POST">
                    <input type="hidden" name="movie_name">
                    <input type="hidden" name="movie_details">
                    <button type="submit">Add to Watchlist</button>
                </form>

                <div class='topic'>
                    <h3>ANIME</h3>

                </div>
                <hr>
                <div class="list">

                    <?php include 'movie-type/movie-type.php'; ?>

                </div>
            </div>


            <div class="movie-topic">

                <div class='topic'>
                    <h3>Studio Ghibli</h3>
                </div>
                <hr>
                <div class="list-GB">
                    <?php include 'movie-type/GB-type.php'; ?>

                </div>
            </div>
        </div>

    </main>

</body>

</html>