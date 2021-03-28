<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require '../boot_header.php'; ?>
<body>
	<?php require_once("menu.php"); ?>
	<div class="container-fluid">
		<div class="row" style="height:55px;">
			<div class="col align-self-center">
				<form class="row g-3" action="" method="GET">
				  <div class="col-auto">
				    <h4>การใช้งานล่าสุด</h4>
				  </div>
				  <div class="col-auto align-self-center">
						<input type="text" class="form-control" name="txt_search">
				  </div>
					<div class="col-auto align-self-center">
						<select style="padding: 6px;border-radius: 4px;border-color: #bac2c9" name="type">
								<option selected disabled>--เลือกประเภท--</option>
								<option value="product">--สินค้า--</option>
								<option value="service">--บริการ--</option>
						</select>
					</div>
					<div class="col-auto align-self-center">
						<input type="submit" class="btn btn-success" name="btn_search" value="ค้นหา">
					</div>
				</form>
			</div>
  	</div>
		<div class="row">
			<div class="col">
				<table class="table table-striped" style="text-align: center">
					<thead>
						<tr>
							<th>รหัสการใช้งาน</th>
							<th>ผู้ใช้งาน</th>
							<th>ชั้นปี</th>
							<th>ประเภทการใช้งาน</th>
							<th>ค่าใช้จ่ายรวม</th>
							<th>เวลา</th>
							<th></th>
						</tr>
					</thead>
					<?php
						$id = $_SESSION['member_id'];
						$sql = "SELECT * FROM orders LEFT JOIN member ON orders.member_id = member.member_id LEFT JOIN level ON member.level_id = level.level_id ORDER BY orders_id DESC";

						if(isset($_GET['txt_search'])){
							$type ="";
							if(isset($_GET['type'])){
								$type = $_GET['type'];
							}
							$txt_search = $_GET['txt_search'];
							$sql = "SELECT * FROM orders LEFT JOIN member ON orders.member_id = member.member_id LEFT JOIN level ON member.level_id = level.level_id WHERE (orders.type LIKE '%".$type."%') AND (datecreate LIKE '%".$txt_search."%' OR firstname LIKE '%".$txt_search."%' OR lastname LIKE '%".$txt_search."%'OR level_name LIKE '%".$txt_search."%') ORDER BY orders_id DESC";
						}
						$result = $connect->query($sql);
						if($result->num_rows==0){echo "<tr><td colspan='5'><center>ไม่พบข้อมูล</td></tr>";}
							while($row = $result->fetch_assoc()){
								$orders_id = $row['orders_id'];
								$sql2 = "SELECT * FROM orders_detail left join service ON orders_detail.service_id = service.service_id LEFT JOIN product ON orders_detail.product_id = product.product_id WHERE orders_id ='$orders_id'";
								$result2 = $connect->query($sql2);
								$total = 0;
								while($row_total = $result2->fetch_assoc()){
									if($row['type']=="service"){
										$type = "บริการ";
										$total += $row_total['amount'] * $row_total['service_cost'];
									}else{
										$type = "สินค้า";
										$total += $row_total['amount'] * $row_total['product_cost'];
									}
								}
					?>
					<tr>
						<td><?php echo $row['orders_id']; ?></td>
						<td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
						<td><?php echo $row['level_name']; ?></td>
						<td><?php echo $type; ?></td>
						<td><?php echo $total." บาท"; ?></td>
						<td><?php echo $row['datecreate']; ?></td>
						<td>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $row['orders_id']; ?>">
								ดูรายละเอียด
							</button>

							<div class="modal fade" id="modal<?php echo $row['orders_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">รายการที่ <?php echo $row['orders_id']; ?> </h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        <?php  ?>
							      		<table class="table">
							      			<tr>
							      				<td>ลำดับ</td>
							      				<td>รายการ</td>
							      				<td>จำนวน</td>
							      				<td>ราคารวม</td>
							      			</tr>
							      			<?php 
							      				$result2 = $connect->query($sql2);
							      				$i=1;
							      				while($row2 = $result2->fetch_assoc()){
							      					if($row['type']=="service"){
							      						$total_price = $row2['amount'] * $row2['service_cost'];
							      					}else{
							      						$total_price = $row2['amount'] * $row2['product_cost'];
							      					}
							      			?>
							      				<tr>
							      					<td><?php echo $i; ?></td>
							      					<td><?php if($row['type']=="service"){echo $row2['service_name'];}else{echo $row2['product_name'];} ?></td>
							      					<td><?php echo $row2['amount']; ?></td>
							      					<td><?php echo $total_price; ?></td>
							      				</tr>
							      			<?php
							      				$i++;
							      				}
							      			?>
							      		</table>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							      </div>
							    </div>
							  </div>
							</div>

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
