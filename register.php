<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างบัญชีใหม่</title>
    <link rel="stylesheet" href="css/register.css">
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
    <h1>สร้างบัญชีของคุณ</h1>
    <form action="process_register.php" method="POST">
        <div>
            <input name="username_account" type="text" placeholder="ชื่อผู้ใช้" required>
        </div>
        <div>
            <input name="email_account" type="email" placeholder="อีเมล" required>
        </div>
        <div>
            <input name="password_account1" type="password" placeholder="รหัสผ่านใหม่" required>
        </div>
        <div>
            <input name="password_account2" type="password" placeholder="ยืนยันรหัสผ่าน" required>
        </div>
        <button type="submit">สร้างบัญชี</button>
        <a href="form_login.php">มีบัญชีแล้วใช่ไหม</a>

    </form>
    
</body>
</html>