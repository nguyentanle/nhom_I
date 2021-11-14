<?php
session_start();
require "config.php";
//require "db.php";
require "user.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ustora Admin Login</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/1c7d1a216b.js" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form action="index.php" method="post">
		 	<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>	
			<span>hoặc sử dụng tài khoản của bạn</span>
			<input type="text" placeholder="Username" name="username"/>
			<input type="password" placeholder="Password" name="pass"/>
			<button  name="submit" ><a href="../posts_view.php">Đăng Nhập</a></button>
			 <a name="register" href="../login/dangky.php"> Đăng Ký</a>
			<h6 ><a href="../index.php">Quay lại trang chủ</a></h6>
		
		</form>
	</div>
</div>
</body>

</html>
<?php
$user=new user;
$getUser=$user->getUser();
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$pass=$_POST['pass'];
	foreach($getUser as $User)
	{
		if($User['username']==$username&&$User['password']==$pass)
		{
			$_SESSION['doan_nhomi']=$username;
			header('location: ../admin/index.php');
		}
	}
}