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
				<div class="col-auto"><h4>แก้ไขข้อมูลสมาชิก</h4></div>
			</div>
		</div>
		<div class="row">
			<div class="col align-self-center">
				<form method="POST" action="">
					<table class="table">
						<tr>
							<td><b>ชื่อ<b/></td>
							<td><input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname'] ?>"  required></td>
						</tr>
						<tr>
							<td><b>นามสกุล<b/></td>
							<td><input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname'] ?>"  required></td>
						</tr>
						<tr>
							<td><b>Person ID<b/></td>
							<td><input type="text" class="form-control" name="person_id" value="<?php echo $row['person_id'] ?>"  required></td>
						</tr>
						<tr>
							<td><b>ระดับชั้น<b/></td>
							<td><select name="level_id" class="form-control">
						<?php while($row2 = $result2->fetch_assoc()){ ?>
						<option <?php if($row2['level_id']==$row['level_id']){echo "selected";} ?> value="<?php echo $row2['level_id']; ?>"><?php echo $row2['level_name']; ?></option>
						<?php } ?>
					</select>
							</td>
						</tr>
						<tr>
							<td><b>สถาน<b/></td>
							<td>
								<select required name="member_status">
									<option selected disabled>--เลือกสถานะผู้ใช้งาน--</option>
									<option value="user">-------User-------</option>
									<option value="admin">-------Admin------</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><b>รหัสผ่าน<b/></td>
							<td><input type="password" class="form-control" name="password" value="<?php echo $row['password'] ?>"  required></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="hidden" name="member_id" value="<?php echo $row['member_id']; ?>">
								<input type="submit" class="btn btn-primary" name="btn_sub" value="แก้ไขข้อมูลสมาชิก">
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
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$person_id = $_POST['person_id'];
		$password = $_POST['password'];
		$level_id = $_POST['level_id'];
		$id = $_POST['member_id'];
		$member_status = $_POST['member_status'];
		$sql="UPDATE member SET member_status = '$member_status',firstname='$firstname',lastname='$lastname',person_id='$person_id',password='$password',level_id='$level_id' WHERE member_id ='$id'";
		$result = $connect->query($sql);
		if($result==1){
			echo "<script>alert('แก้ไขสำเร็จ')</script>";
			echo "<meta http-equiv='refresh' content='0;url=index.php'>";
		}else{
			echo "<script>alert('แก้ไมไม่สำเร็จ')</script>";
			echo "<meta http-equiv='refresh' content='0'>";
		}
	}
?>
