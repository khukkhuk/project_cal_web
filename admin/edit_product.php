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
		$sql = "SELECT * FROM product WHERE product_id = '$id'";
		$result = $connect->query($sql);
		$row = $result->fetch_assoc();
	?>
	<div class="container-fluid">
		<div class="row" style="height:55px;">
			<div class="col align-self-center">
				<div class="col-auto"><h4>แก้ไขข้อมูลสินค้า</h4></div>
			</div>
		</div>
		<div class="row">
			<div class="col align-self-center">
				<center>
					<form enctype="multipart/form-data" action="" method="post">
						<table style="width:300px; height:55px;">
							<tr>
								<td><input type="file" name="upload"><input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>"></td>
								<td><input type="submit" class="form-control btn-info" name="btn_img" value="อัพโหลดภาพ" onclick="return confirm('ยืนยันการอัพโหลด ?');"></td>
							</tr>
						</table>
					</form>
				</center>
				<form method="POST" action="">
					<table class="table">
						<tr>
							<td><b>ชนิดสินค้า</b></td>
							<td><input type="text" class="form-control" name="product_name" value="<?php echo $row['product_name']; ?>"  required></td>
						</tr>
						<tr>
							<td><b>ราคาสินค้า</b></td>
							<td><input type="number" class="form-control" min="1" name="product_cost" value="<?php echo $row['product_cost']; ?>"  required></td>
						</tr>
						<tr>
							<td><b>จำนวนสินค้า</b></td>
							<td><input type="number" class="form-control" min="1" name="product_amount" value="<?php echo $row['product_amount']; ?>"  required></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
								<input type="submit" class="btn btn-primary" name="btn_sub" value="แก้ไขข้อมูลสินค้า">
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
			copy($_FILES['upload']['tmp_name'],"../img/p".$_POST['product_id'].$ex);
			$part = "../img/p".$_POST['product_id'].$ex;
			$sql="UPDATE product SET product_img = '$part' WHERE product_id ='$id'";
			$result = $connect->query($sql);
			echo "<script>alert('อัพโหลดรูปภาพสำเร็จ')</script>";
		}else{
			echo "<script>alert('กรุณาเลือกรูปภาพ')</script>";
		}
	}
	if(isset($_POST['btn_sub'])){
		$product_name = $_POST['product_name'];
		$product_cost = $_POST['product_cost'];
		$product_amount = $_POST['product_amount'];
		$id = $_POST['product_id'];
		$sql="UPDATE product SET product_amount='$product_amount',product_name='$product_name',product_cost='$product_cost' WHERE product_id ='$id'";
		$result = $connect->query($sql);
		if($result==1){
			echo "<script>alert('แก้ไขสำเร็จ')</script>";
			echo "<meta http-equiv='refresh' content='0;url=manage_product.php'>";
		}else{
			echo "<script>alert('แก้ไมไม่สำเร็จ')</script>";
			echo "<meta http-equiv='refresh' content='0'>";
		}
	}
?>
