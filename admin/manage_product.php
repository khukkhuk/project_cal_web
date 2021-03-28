<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require '../boot_header.php'; ?>
</head>
<body>
	<?php require_once("menu.php"); ?>
	<div class="container-fluid">
	<div class="row" style="height:55px;">
		<div class="col align-self-center">
			<form class="row g-3" action="" method="GET">
				<div class="col-auto">
					<h4>จัดการข้อมูลสินค้า</h4>
				</div>
				<div class="col-auto align-self-center">
					<div class="row g-3 align-items-center">
					  <div class="col-auto">
					    <input type="text" class="form-control" name="txt_search">
					  </div>
					  <div class="col-auto">
					    <input type="submit" class="btn btn-success" name="btn_search" value="ค้นหาสินค้า">
					  </div>
					 </div>
					</div>
				</div>
			</form>
			<div class="col-auto align-self-center">
				<a href="add_product.php"><button class="btn btn-primary"><i class="fa fa-paper-plane"></i> เพิ่มข้อมูลสินค้า</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>ชื่อสินค้า</th>
							<th>ราคาสินค้า</th>
							<th>จำนวนสินค้า</th>
							<th>ภาพตัวอย่าง</th>
							<th>จัดการ</th>
						</tr>
					</thead>
					<?php
						$sql = "SELECT * FROM product";
						if(isset($_GET['txt_search'])){
							$txt_search = $_GET['txt_search'];
							$sql = "SELECT * FROM product WHERE product_name  LIKE '%".$txt_search."%'";
						}
						$result = $connect->query($sql);
						if($result->num_rows==0){echo "<tr><td colspan='4'><center>ไม่พบข้อมูล</td></tr>";}
						while($row = $result->fetch_assoc()){
					?>
					<tr>
						<td><?php echo $row['product_id']; ?></td>
						<td><?php echo $row['product_name']; ?></td>
						<td><?php echo $row['product_cost']; ?></td>
						<td><?php echo $row['product_amount']." ชิ้น"; ?></td>
						<td><img width="100" src="<?php if($row['product_img']==""){echo "../img/no.png";}else{echo $row['product_img'];} ?>" style="border-radius:5px;"></td>
						<td><a href="manage_product.php?del=1&id=<?php echo $row['product_id']; ?>"><button class="btn btn-danger">ลบข้อมูล</button></a>
							<a href="edit_product.php?id=<?php echo $row['product_id'] ?>"><button class="btn btn-warning">แก้ไขข้อมูล</button></a>
						</td>
					</tr>
					<?php
						}
					?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	if(isset($_GET['del'])AND$_GET['del']==1){
		$id = $_GET['id'];
		$sql= "DELETE FROM product WHERE product_id = '$id'";
		$result = $connect->query($sql);
		if($result==1){
			echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
			echo "<meta http-equiv='refresh' content='0;manage_product.php'>";
		}
	}
?>
