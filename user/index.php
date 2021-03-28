<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<?php require '../boot_header.php'; ?>
<!-- <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
</style>
</head> -->
<body>
	<?php
		include ("menu.php");
		$sql = "SELECT * FROM service";
		$result = $connect->query($sql);
		$result2 = $connect->query($sql);
		$i = 0;
		$_SESSION['service_id'] = array();
		while($row2 = $result2->fetch_assoc()){
			$_SESSION['service_id'][$i] = $row2['service_id'];
			$i++;
		}
		$_SESSION['service_id'] = $i;
		// echo $_SESSION['service_id']['0'];

	?>
	<div class="container-fluid">
		<div class="row" style="height:55px;">
			<div class="col align-self-center">
				<div class="col-9">
				  <h4>การบริการต่าง ๆ</h4>
				</div>
			</div>
  	</div>
  		<form action="" method="post">
			<div class="row">
				<?php while($row = $result->fetch_assoc()){	?>
					<input type="hidden" name="<?php echo $row['service_id']; ?>" value="<?php echo $row['service_id']; ?>">
					<div class="col-sm-2">
						<div class="card" style="height:330px; overflow:hidden;">
						  <div class="card-body">
								<h5 class="card-title"><?php echo $row['service_name'];?></h5>
								<p class="card-text"><img height="200px" width="100%" src="<?php if($row['service_img']!=""){echo $row['service_img'];}else{echo "../img/no.png";}?>" style="border-radius:10px;"></p>
								<input type="number" class="form-control" name="quantity<?php echo $row['service_id']; ?>" min="0" max="99" value="0" required>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
<br>

								<button type="submit" name="btn_sub" class="btn btn-primary" onclick="return confirm('ยืนยันการส่งข้อมูล ?');"><i class='fas fa-money-bill-wave'></i> ชำระค่าบริการ</button>
								<button type="reset" class="btn btn-danger">ยกเลิก</button>
		</form>
	</div>

</body>
</html>

<?php
	if(isset($_POST['btn_sub'])){
		$member_id = $_SESSION['member_id'];
		$total = 0;

		$sql = "SELECT * FROM service";
		$result = $connect->query($sql);
		while($row = $result->fetch_assoc()){
			$id = $row['service_id'];
			$amount = $_POST['quantity'.$id];
			if($amount>0){
				if(empty($last_id)){
					$sql2 = "INSERT INTO orders (member_id,type) VALUES ('$member_id','service')";
					$connect->query($sql2);
					$last_id = $connect->insert_id;
				}
				$sql = "INSERT INTO `orders_detail`(orders_id,`service_id`, `amount`) VALUES ('$last_id','$id','$amount')";
				$connect->query($sql);
				$total += $amount * $row['service_cost'];
			}
		}
		if(empty($last_id)){
			echo "<script>alert('กรุณาเลือกรายการ')</script>";
		}else{
			echo "<script>alert('ทำรายการสำเร็จค่าบริการ $total บาท')</script>";
			echo "<meta http-equiv='refresh' content='0;url=history.php'>";
		}

		
	}
	
?>
