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
						<h4>จัดการข้อมูลผู้ใช้</h4>
					</div>
					<div class="col-auto align-self-center">
						<div class="row g-3 align-items-center">
						  <div class="col-auto">
						    <input type="text" class="form-control" name="txt_search">
						  </div>
						  <div class="col-auto">
						    <input type="submit" class="btn btn-success" name="btn_search" value="ค้นหาผู้ใช้">
						  </div>
						 </div>
						</div>
					</div>
				</form>
				<div class="col-auto align-self-center">
					<a href="add_member.php"><button class="btn btn-primary"><i class="fa fa-address-book"></i> เพิ่มข้อมูลผู้ใช้</button></a>
				</div>
			</div>
		<div class="row">
			<div class="col">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Username</th>
							<th>ชื่อ</th>
							<th>นามสกุล</th>
							<th>Person ID</th>
							<th>ระดับชั้น</th>
							<th>สถานะ</th>
							<th>จัดการ</th>
						</tr>
					</thead>
					<?php
						$sql = "SELECT * FROM member LEFT JOIN level on member.level_id = level.level_id";
						if(isset($_GET['txt_search'])){
							$txt_search = $_GET['txt_search'];
							$sql = "SELECT * FROM member LEFT JOIN level on member.level_id = level.level_id WHERE (username LIKE '%".$txt_search."%' OR firstname LIKE '%".$txt_search."%' OR person_id LIKE '%".$txt_search."%' OR level_name LIKE '%".$txt_search."%' OR lastname LIKE '%".$txt_search."%' ) ";
						}
						$result = $connect->query($sql);
						if($result->num_rows==0){echo "<tr><td colspan='8'><center>ไม่พบข้อมูล</td></tr>";}
						while($row = $result->fetch_assoc()){
					?>
					<tr>
						<td><?php echo $row['member_id']; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['firstname']; ?></td>
						<td><?php echo $row['lastname']; ?></td>
						<td><?php echo $row['person_id']; ?></td>
						<td><?php echo $row['level_name']; ?></td>
						<td><?php echo $row['member_status']; ?></td>
						<td><a href="manage_member.php?del=1&&id=<?php echo $row['member_id']; ?>"><button class="btn btn-danger">ลบข้อมูล</button></a>
							<a href="edit_member.php?id=<?php echo $row['member_id'] ?>"><button class="btn btn-warning">แก้ไขข้อมูล</button></a>
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
		$sql= "DELETE FROM member WHERE member_id = '$id'";
		$result = $connect->query($sql);
		if($result==1){
			echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
			echo "<meta http-equiv='refresh' content='0;manage_member.php'>";
		}
	}
?>
