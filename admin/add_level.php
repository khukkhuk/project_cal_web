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
				<div class="col-auto"><h4>เพิ่มข้อมูลชั้นปี</h4></div>
			</div>
		</div>
		<div class="row">
			<div class="col align-self-center">
				<form method="POST" action="">
					<table class="table">
						<tr>
							<td><b>ชื่อชั้นปี</b></td>
							<td><input type="text" class="form-control" name="level_name" required></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" class="btn btn-primary" name="btn_sub" value="เพิ่มชั้นปี">
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
			$level_name = $_POST['level_name'];
			$sql = "INSERT INTO `level`(`level_name`) VALUES ('$level_name')";

			$result = $connect->query($sql);
			if($result==1){
					echo "<script>alert('Add Success')</script>";
					echo "<meta http-equiv='refresh' content='0;url=manage_level.php'>";
			}else{
					echo "<script>alert('Add Fail')</script>";
			}
	}
?>
