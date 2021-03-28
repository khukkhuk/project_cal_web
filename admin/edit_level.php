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
		$sql = "SELECT * FROM level WHERE level_id = '$id'";
		$result = $connect->query($sql);
		$row = $result->fetch_assoc();
	?>
	<div class="container-fluid">
		<div class="row" style="height:55px;">
			<div class="col align-self-center">
				<div class="col-auto"><h4>แก้ไขข้อมูลชั้นปี</h4></div>
			 </div>
			</div>
			<div class="row">
				<div class="col align-self-center">
					<form method="POST" action="">
						<table class="table">
							<tr>
								<td><b>ชื่อระดับชั้น</b></td>
								<td><input type="text" class="form-control" name="level_name" value="<?php echo $row['level_name']; ?>"  required></td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="hidden" name="level_id" value="<?php echo $row['level_id']; ?>">
									<input type="submit" class="btn btn-primary" name="btn_sub" value="แก้ไขข้อมูลระดับชั้น">
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
		$id = $_POST['level_id'];
		$sql="UPDATE level SET level_name='$level_name' WHERE level_id ='$id'";
		$result = $connect->query($sql);
		if($result==1){
			echo "<script>alert('แก้ไขสำเร็จ')</script>";
			echo "<meta http-equiv='refresh' content='0;url=manage_level.php'>";
		}else{
			echo "<script>alert('แก้ไมไม่สำเร็จ')</script>";
			echo "<meta http-equiv='refresh' content='0'>";
		}
	}
?>
