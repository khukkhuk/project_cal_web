<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require '../boot_header.php'; ?>
</head>
<body>
	<?php require_once("menu.php");
		$sql = "SELECT * FROM level";
		$result = $connect->query($sql);
	?>
	<div class="container-fluid">
		<div class="row" style="height:55px;">
			<div class="col align-self-center">
				<div class="col-auto"><h4>เพิ่มข้อมูลสมาชิก</h4></div>
			</div>
		</div>
		<div class="row" style="height:55px;">
			<div class="col align-self-center">
				<form method="POST" action="">
					<table class="table">
						<tr>
							<td><b>Username</b></td>
							<td><input type="text" class="form-control" name="username" required></td>
						</tr>
						<tr>
							<td><b>รหัสผ่าน</b></td>
							<td><input type="password" class="form-control" name="password" required></td>
						</tr>
						<tr>
							<td><b>ชื่อ</b></td>
							<td><input type="text" class="form-control" name="firstname" required></td>
						</tr>
						<tr>
							<td><b>นามสกุล</b></td>
							<td><input type="text" class="form-control" name="lastname" required></td>
						</tr>
						<tr>
							<td><b>Person ID</b></td>
							<td><input type="text" class="form-control" name="person_id" required></td>
						</tr>
						<tr>
							<td><b>ระดับชั้น</b></td>
							<td><select name="level_id" class="form-control">
									<?php while($row = $result->fetch_assoc()){ ?>
										<option value="<?php echo $row['level_id']; ?>"><?php echo $row['level_name']; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" class="btn btn-primary" name="btn_sub" value="เพิ่มข้อมูลสมาชิก">
								<input type="reset" class="btn btn-danger" value="ยกเลิก">
							</td>
						</tr>
					</table>
				</form>
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
			$sql = "INSERT INTO `member`(`username`, `password`, `firstname`, `lastname`, `person_id`, `level_id`, `member_status`) VALUES ('$username','$password','$firstname','$lastname','$person_id','$level_id','user')";

			$result = $connect->query($sql);
			if($result==1){
					echo "<script>alert('Register Success')</script>";
					echo "<meta http-equiv='refresh' content='0;url=manage_member.php'>";
			}else{
					echo "<script>alert('Register Fail')</script>";
			}
	}
?>
