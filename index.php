<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.min.css">
	<script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/edit_body.css">
		<!-- <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css"> -->
		<style type="text/css">
			 .col1{
				background-image: linear-gradient(to right, #99B1FC , #99DDFC);
			} 
			 .btn-col1{
				background-image: linear-gradient(to right, #99B1FC , #99DDFC);
				color: #FFFFFF;
			} 
		</style>
</head>
<body style="background-color:rgba(72, 126, 176,1.0);">
	<body class="col1"><br>
	<div class="container">
			<center>
				<div class="card rounded-lg" style="width: 570px; top: 100px; background-color:#99CCCC;">
					<div class="card-body">
						<h4>กรุณากรอก Username และ Password เพื่อเข้าใช้งาน</h4>
						<br>
						<form action="" method="POST">
						  <div class="form-group">
						    <input type="text" class="form-control" placeholder="Username" name="username" required>
						  </div>
						  <div class="form-group">
						    <input type="password" class="form-control" placeholder="Password" name="password" required>
						  </div>
							<div class="form-group" style="text-align:right;">
								<hr>
						  		<a href="register.php" data-toggle="modal" data-target="#reg">สมัครสมาชิก !!</a>
									<a>&nbsp&nbsp&nbsp&nbsp</a>
									<button type="submit" class="btn btn-success" name="btn_sub">เข้าสู่ระบบ</button>
						  </div>
						</form>
					</div>
				</div>
			</center>
	</div>
<!-- 	<div class="container" style="margin-top:10%">
	<center>
	<form action="" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" required></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" required></td>
			</tr>
			<tr>
				<td colspan="2"> <center><input type="submit" name="btn_sub" value="Login"><a href="register.php">Register</a></td>
			</tr>
		</table>

	</form>
	</center>
	</div> -->
</body>
</html>
<?php
	if(isset($_POST['btn_sub'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		require_once("connect.php");
		$sql = "SELECT * FROM member LEFT JOIN level ON member.level_id = level.level_id WHERE username='$username' AND password ='$password'";
		$result = $connect->query($sql);
		if($result->num_rows>0){
			$row = $result->fetch_assoc();
			$_SESSION['member_id'] = $row['member_id'];
			$_SESSION['firstname'] = $row['firstname'];
			$_SESSION['lastname'] = $row['lastname'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['level_name'] = $row['level_name'];
			$_SESSION['person_id'] = $row['person_id'];
			$_SESSION['member_img'] = $row['member_img'];

				echo "<script>alert('เข้าสู่ระบบสำเร็จ')</script>";
			if($row['member_status']=="admin"){
				echo "<meta http-equiv='refresh' content='0;url=admin/index.php'>";
			}else{
				echo "<meta http-equiv='refresh' content='0;url=user/index.php'>";
			}
		}else{
			echo "<script>alert('Username หรือ Password ผิดพลาด')</script>";
		}
	}
?>
