<?php
session_start();
$open_connect = 1;
require('connect.php');

if (isset($_POST["submit"])) {
    $title = $_POST['title'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password =  $_POST['password'];
    $password_con = $_POST['password_con'];


	$check_member = mysqli_query($connect, "SELECT * FROM member WHERE email = '$email' ");
	if (mysqli_num_rows($check_member) >= 1) {

		echo '<script language="javascript">alert("อีเมลนี้ ถูกใช้ไปเเล้ว")</script>';
    } else {
			if ($password != $password_con) {
				echo '<script language="javascript">alert("รหัสผ่านผิดพลาด")</script>';
			} else {
                $create_account = "INSERT INTO member VALUES ('', '$title', '$name', '$surname', '$phone', '$username', '$email', '$password','')";
				mysqli_query($connect, $create_account);
				echo '<script language="javascript">alert("สมัครสมาชิก เสร็จสิ้น")</script>';
				header("location:index.php");
			}
		}
	}

?>
