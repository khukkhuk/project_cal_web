<!-- <style type="text/css">
	ul {
	  list-style-type: none;
	  margin: 0;
	  padding: 0;
	  overflow: hidden;
	  background-color: #3399FF;
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
	  background-color: #3399CC;
	}
</style> -->
<?php
session_start();
if(empty($_SESSION['member_id'])AND$_SESSION['member_id']==""){
	echo "<script>alert('กรุณาเข้าสู่ระบบ')</script>";
	echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
} ?>
<!-- <title>User</title> -->
<nav class="navbar navbar-expand-sm" style="background-color:#40739e;">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link text-white" href="index.php"><i class='fa fa-home'></i> หน้าหลัก</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-white" href="shopping.php"><i class='fas fa-shopping-cart'></i> สินค้า</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-white" href="history.php"><i class='fa fa-history'></i> เรียกดูประวัติ</a>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<?php if($_SESSION['member_img']!=""){ ?><img src="<?php echo $_SESSION['member_img']; ?>" width="32"><?php } ?>
		</li>
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
