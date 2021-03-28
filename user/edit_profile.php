<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require '../boot_header.php'; ?>
</head>
<body>
	<?php
		require_once("menu.php");
		$id = $_GET['id'];
		$sql = "SELECT * FROM member WHERE member_id = '$id'";
		$result = $connect->query($sql);
		$row = $result->fetch_assoc();
		$sql2 = "SELECT * FROM level";
		$result2 = $connect->query($sql2);
	?>
	<div class="container-fluid">
		<div class="row" style="height:55px;">
			<div class="col align-self-center">
				<div class="col-9">
				  <h4>แก้ไขข้อมูลส่วนตัว</h4>
				</div>
			</div>
  	</div>
		<form enctype="multipart/form-data" action="" method="post">
			<table style="height:80px;">
				<tr>
					<td><b>แก้ไขรูปภาพ</b></td>
				</tr>
				<tr>
					<td><input type="file" name="upload"></td>
					<td><input type="submit" class="btn btn-info" name="btn_img" value="อัพโหลดภาพ" onclick="return confirm('ยืนยันการอัพโหลด ?');"></td>
				</tr>
			</table>
		</form>
		<form method="POST" action="">
			<table class="table">
				<tr>
					<td><b>ชื่อ</b></td>
					<td><input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname'] ?>"  required></td>
				</tr>
				<tr>
					<td><b>นามสกุล</b></td>
					<td><input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname'] ?>"  required></td>
				</tr>
				<tr>
					<td><b>รหัสผ่าน</b></td>
					<td><input type="password" class="form-control" name="password" required></td>
				</tr>
				<tr>
					<td><b>ยืนยันรหัสผ่าน</b></td>
					<td><input type="password" class="form-control" name="passwordc" required></td>
				</tr>
				<tr>
					<td><b>ระดับชั้น</b></td>
					<td>
						<select class="form-control" name="level_id">
							<?php while($row2 = $result2->fetch_assoc()){ ?>
								<option <?php if($row2['level_id']==$row['level_id']){echo "selected";} ?> value="<?php echo $row2['level_id']; ?>"><?php echo $row2['level_name']; ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $row['member_id']; ?>">
						<input type="submit" class="btn btn-primary" name="btn_sub" value="แก้ไขข้อมูลโปรไฟล์">
						<input type="reset" class="btn btn-danger" value="ยกเลิก"></td>
				</tr>
			</table>
		</form>
</body>
</html>
<?php
	if(isset($_POST['btn_img'])){
		if($_FILES['upload']['name']!=""){
			copy($_FILES['upload']['tmp_name'],"../img/".$_FILES['upload']['name']);
			$part = "../img/".$_FILES['upload']['name'];
			$sql="UPDATE member SET member_img = '$part' WHERE member_id ='$id'";
			$result = $connect->query($sql);
			echo "<script>alert('อัพโหลดรูปภาพสำเร็จ')</script>";
		}else{
			echo "<script>alert('กรุณาเลือกรูปภาพ')</script>";
		}
	}
	if(isset($_POST['btn_sub'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$level_id = $_POST['level_id'];
		$password = $_POST['password'];
		$passwordc = $_POST['passwordc'];
		if($passwordc==$password){
			$sql="UPDATE member SET level_id='$level_id',firstname='$firstname',lastname='$lastname',password='$password' WHERE member_id ='$id'";
			$result = $connect->query($sql);
			if($result==1){
				$sql2 = "SELECT * FROM level WHERE level_id = '$level_id'";
				$rs2 = $connect->query($sql2);
				$row2 = $rs2->fetch_assoc();
				$level_name = $row2['level_name'];
				$_SESSION['firstname'] = $firstname;
				$_SESSION['lastname'] = $lastname;
				$_SESSION['level_name'] = $level_name;
				echo "<script>แก้ไขสำเร็จ</script>";
				//echo "<meta http-equiv='refresh' content='0;url=index.php'>";
			}else{
				echo "<script>แก้ไมไม่สำเร็จ</script>";
				echo "<meta http-equiv='refresh' content='0'>";
			}
		}else{
			echo "<script>รหัสผ่านไม่ตรงกัน กรุณาตรวจสอบอีกครั้ง</script>";
			echo "<meta http-equiv='refresh' content='0'>";
		}
	}

?>
