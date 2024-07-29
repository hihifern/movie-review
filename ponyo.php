<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/movie.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/login.css">
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
            <div class="slide" style="background-image: url('img/ponyo036.jpg');">
                <div class="banner-info">
                    <h1>Spirited Away</h1>
                    <p>แฟนตาซี </p>
                    <button>สตรีมเลย</button>
                </div>
            </div>
        </div>

    </div>

</body>

</html>