<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.min.css">
	<script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/edit_body.css">
</head>
<body style="background-color:rgba(72, 126, 176,1.0);">
	<?php require_once("connect.php");
		$sql = "SELECT * FROM level";
		$result = $connect->query($sql);
	?>
 <div class="container-fluid">
	 <div class="row">
	 <div class="col-lg">
		 <center>
		 <div class="card bg-light text-left" style="width:60%; height: 450px; margin:110px 0 10px 0; padding:10px;">
			 <p class="text-center"><h4>สมัครสมาชิก</h4></p>
			 <form action="" method="POST">
				 <div class="form-row">
					 <div class="form-group col-md-6">
						 <label for="username">Username</label>
						 <input type="text" name="username" class="form-control" required>
					 </div>
					 <div class="form-group col-md-6">
						 <label for="password">Password</label>
						 <input type="password" name="password" class="form-control" required>
					 </div>
				 </div>
				 <div class="form-row">
					 <div class="form-group col-md-6">
						 <label for="firstname">Firstname</label>
						 <input type="text" name="firstname" class="form-control" required>
					 </div>
					 <div class="form-group col-md-6">
						 <label for="lastname">Lastname</label>
						 <input type="text" name="lastname" class="form-control" required>
					 </div>
				 </div>
				 <div class="form-row">
					 <div class="form-group col-md-6">
						 <label for="person_id">Person ID</label>
						 <input type="text" name="person_id" class="form-control" required>
					 </div>
					 <div class="form-group col-md-6">
						 <label for="lev">Level</label>
						 <select class="form-control" name="level_id">
							 <?php while($row = $result->fetch_assoc()){ ?>
		 		 				<option value="<?php echo $row['level_id']; ?>"><?php echo $row['level_name']; ?></option>
		 		 				<?php } ?>
							</select>
					 </div>
				 </div>
				 <hr>
				 <div class="form-row">
					 <div class="form-group col-md-6">
						 <button type="submit" class="btn btn-primary" name="btn_sub">สมัครสมาชิก</button>
						 <button type="reset" class="btn btn-danger">ยกเลิก</button>
					 </div>
					 <div class="form-group col-md-6" style="text-align:right;">
					 	<a href="index.php">กลับไปหน้าแรก</a>
					 </div>
				 </div>

			 </form>
		 </div>
	 </center>
	 </div>
	</div>
 </div>
</body>
</html>
<?php
	if(isset($_POST['btn_sub'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$person_id = $_POST['person_id'];
			$level_id = $_POST['level_id'];
			require_once("connect.php");
			$sql = "INSERT INTO `member`(`username`, `password`, `firstname`, `lastname`, `person_id`, `level_id`, `member_status`) VALUES ('$username','$password','$firstname','$lastname','$person_id','$level_id','user')";

			$result = $connect->query($sql);
			if($result==1){
					echo "<script>alert('Register Success')</script>";
					echo "<meta http-equiv='refresh' content='0;url=index.php'>";
			}else{
					echo "<script>alert('Register Fail')</script>";
			}
	}
?>
