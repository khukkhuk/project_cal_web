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
		$sql = "SELECT * FROM service WHERE service_id = '$id'";
		$result = $connect->query($sql);
		$row = $result->fetch_assoc();
	?>
	<div class="container-fluid">
		<div class="row" style="height:55px;">
			<div class="col align-self-center">
				<div class="col-auto"><h4>แก้ไขข้อมูลบริการ</h4></div>
			</div>
		</div>
		<div class="row">
			<div class="col align-self-center">
				<center>
					<form enctype="multipart/form-data" action="" method="post">
						<table style="width:300px; height:55px;">
							<tr>
								<td><input type="file" name="upload"><input type="hidden" name="service_id" value="<?php echo $row['service_id']; ?>"></td>
								<td><input type="submit" class="form-control btn-info" name="btn_img" value="อัพโหลดภาพ" onclick="return confirm('ยืนยันการอัพโหลด ?');"></td>
							</tr>
						</table>
					</form>
				</center>
				<form method="POST" action="">
					<table class="table">
						<tr>
							<td><b>การบริการ</b></td>
							<td><input type="text" class="form-control" name="service_name" value="<?php echo $row['service_name']; ?>"  required></td>
						</tr>
						<tr>
							<td><b>ราคาบริการ</b></td>
							<td><input type="number" class="form-control" min="1" name="service_cost" value="<?php echo $row['service_cost']; ?>"  required></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="hidden" name="service_id" value="<?php echo $row['service_id']; ?>">
								<input type="submit" class="btn btn-primary" name="btn_sub" value="แก้ไขข้อมูลบริการ">
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
	if(isset($_POST['btn_img'])){
		if($_FILES['upload']['name']!=""){
			$ex = strstr($_FILES['upload']['name'],".");
			copy($_FILES['upload']['tmp_name'],"../img/s".$_POST['service_id'].$ex);
			$part = "../img/s".$_POST['service_id'].$ex;
			$sql="UPDATE service SET service_img = '$part' WHERE service_id ='$id'";
			$result = $connect->query($sql);
			echo "<script>alert('อัพโหลดรูปภาพสำเร็จ')</script>";
		}else{
			echo "<script>alert('กรุณาเลือกรูปภาพ')</script>";
		}
	}
	if(isset($_POST['btn_sub'])){
		$service_name = $_POST['service_name'];
		$service_cost = $_POST['service_cost'];
		$id = $_POST['service_id'];
		$sql="UPDATE service SET service_name='$service_name',service_cost='$service_cost' WHERE service_id ='$id'";
		$result = $connect->query($sql);
		if($result==1){
			echo "<script>alert('แก้ไขสำเร็จ')</script>";
			echo "<meta http-equiv='refresh' content='0;url=manage_service.php'>";
		}else{
			echo "<script>alert('แก้ไมไม่สำเร็จ')</script>";
			echo "<meta http-equiv='refresh' content='0'>";
		}
	}
?>
