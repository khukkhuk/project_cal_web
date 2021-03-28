<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require '../boot_header.php'; ?>
</head>
<body>
	<?php require_once("menu.php");?>
	<div class="container-fluid">
		<div class="row" style="height:55px;">
			<div class="col align-self-center">
				<div class="col-auto"><h4>เพิ่มข้อมูลบริการ</h4></div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<form method="POST" action="">
					<table class="table">
						<tr>
							<td><b>ชื่อบริการ</b></td>
							<td><input type="text" class="form-control" name="service_name" required></td>
						</tr>
						<tr>
							<td><b>ราคาบริการ</b></td>
							<td><input type="text" class="form-control" name="service_cost" required></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" class="btn btn-primary" name="btn_sub" value="เพิ่มข้อมูลบริการ">
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
			$service_name = $_POST['service_name'];
			$service_cost = $_POST['service_cost'];
			$sql = "INSERT INTO `service`(`service_name`, `service_cost`) VALUES ('$service_name','$service_cost')";

			$result = $connect->query($sql);
			if($result==1){
					echo "<script>alert('Add Success')</script>";
					echo "<meta http-equiv='refresh' content='0;url=manage_service.php'>";
			}else{
					echo "<script>alert('Add Fail')</script>";
			}
	}
?>
