<!-- <style type="text/css">
	ul {
	  list-style-type: none;
	  margin: 0;
	  padding: 0;
	  overflow: hidden;
	  background-color: #333;
	}

	li {
	  float: left;
	}

	li a {
	  display: block;
	  color: white;
	  text-align: center;
	  padding: 14px 16px;
	  text-decoration: none;
	}

	li a:hover {
	  background-color: #111;
	}
</style> -->

<?php
	session_start();
	if(empty($_SESSION['member_id'])AND$_SESSION['member_id']==""){
		echo "<script>alert('กรุณาเข้าสู่ระบบ')</script>";
		echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
	} ?>
		<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="container-fluid">
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar">
					<li></li>
					<li><a href="manage_member.php">จัดการผู้ใช้</a></li>
					<li><a href="manage_level.php">จัดการชั้นปี</a></li>
					<li><a href="manage_paper.php">จัดการกระดาษ</a></li>
					<li><a href="manage_ink.php">จัดการหมึก</a></li>
					<li><?php echo "ยินดีต้อนรับคุณ ".$_SESSION['firstname']." ".$_SESSION['lastname']." ระดับชั้น ".$_SESSION['level_name'];?>
						<a href="edit_profile.php?id=<?php echo $_SESSION['member_id']; ?>">แก้ไขข้อมูล</a>
					</li>
					<li><a href="../logout.php">ออกจากระบบ</a></li>
				</ul>
	    </div>
	  </div>
	</nav> -->
	<nav class="navbar navbar-expand-sm" style="background-color:#40739e;">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link text-white" href="index.php"><i class='fa fa-home'></i> หน้าหลัก</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" href="manage_level.php"><i class='fa fa-user-graduate'></i> จัดการชั้นปี</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" href="manage_product.php"><i class='fa fa-paper-plane'></i> จัดการสินค้า</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" href="manage_service.php"><i class='fa fa-book'></i> จัดการการบริการ</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" href="manage_member.php"><i class='fa fa-users'></i> จัดการผู้ใช้</a>
			</li>
		</ul>
		<ul class="nav navbar-nav ml-auto">
			<li class="nav-item align-self-center">
					<a class="nav-link text-white"><?php echo "ยินดีต้อนรับคุณ ".$_SESSION['firstname']." ".$_SESSION['lastname']." ระดับชั้น ".$_SESSION['level_name'];?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="edit_profile.php?id=<?php echo $_SESSION['member_id']; ?>"><button type="button" class="btn btn-warning"><i class='fa fa-edit'></i> แก้ไขข้อมูลโปรไฟล์</button></a>
			</li>
			<li>
				<a class="nav-link" href="../logout.php"><button type="button" class="btn btn-danger">ออกจากระบบ</button></a>
			</li>
		</ul>
</nav>
<?php require_once("../connect.php"); ?>
