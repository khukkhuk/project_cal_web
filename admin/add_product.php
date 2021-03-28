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
				<div class="col-auto"><h4>เพิ่มข้อมูลสินค้า</h4></div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<form method="POST" action="">
					<table class="table">
						<tr>
							<td><b>ชื่อสินค้า</b></td>
							<td><input type="text" class="form-control" name="product_name" required></td>
						</tr>
						<tr>
							<td><b>ราคาสินค้า</b></td>
							<td><input type="text" class="form-control" name="product_cost" required></td>
						</tr>
						<tr>
							<td><b>จำนวนสินค้า</b></td>
							<td><input type="number" class="form-control" name="product_amount" required></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" class="btn btn-primary" name="btn_sub" value="เพิ่มข้อมูลสินค้า">
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
			$product_name = $_POST['product_name'];
			$product_cost = $_POST['product_cost'];
			$product_amount = $_POST['product_amount'];

			$sql = "INSERT INTO `product`(`product_name`, `product_cost`,product_amount) VALUES ('$product_name','$product_cost','$product_amount')";

			$result = $connect->query($sql);
			if($result==1){
					echo "<script>alert('Add Success')</script>";
					echo "<meta http-equiv='refresh' content='0;url=manage_product.php'>";
			}else{
					echo "<script>alert('Add Fail')</script>";
			}
	}
?>
