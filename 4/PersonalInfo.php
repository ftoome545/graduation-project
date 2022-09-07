
<?php
session_start();
//include 'connect.php';
$con=mysqli_connect("localhost","root","","fr");
if(!$con){
	die("Failed to Establish Database Connection");

}
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['is_admin']!=0){
		header("Location:admin.php");
	}

	$data=array();
	$qr=mysqli_query($con,"select * from employee where id='".$_SESSION['user_data']['id']."'");
	while($row=mysqli_fetch_assoc($qr)){
		array_push($data,$row);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Personal Info</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-image:url('p.png'); background-repeat: no-repeat; background-color: #90B4E0 ; ">
	<br>
	<br>
	<a href="http://localhost/4/employee.php">
	<img src="logo_0.png" height="150" width="150" alt="logo"></a>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
<div class="container">
	<div class="row">
   		<?php if(isset($_REQUEST['error'])) { ?>
   		<div class="col-lg-12">
   			<span class="alert alert-danger" style="display: block;">
   				<?php echo $_REQUEST['error']; ?>
			</span>
   		</div>
	   	<?php } ?>
	 </div>
	 <div class="row">
   		<?php if(isset($_REQUEST['success'])) { ?>
   		<div class="col-lg-12">
   			<span class="alert alert-success" style="display: block;">
   				<?php echo $_REQUEST['success']; ?>
			</span>
   		</div>
	   	<?php } ?>
	 </div>
	<br>
	<br>
	<br>
	<br>
	<div>
	<div>
		<h2>Personal Info</h2>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div>
			<table class="table table-bordered">
				<tr>
					<th>Name</th>
					<th>Gender</th>
					<th>Email</th>
					<th>Social_id</th>
				</tr>
				<?php
				  foreach($data as $d) {
				 ?>
				 <tr>
				 	<td><?php echo $d['full_name']; ?></td>
				 	<td><?php echo $d['Gender']; ?></td>
					<td><?php echo $d['Email']; ?></td>
					<td><?php echo $d['Social_id']; ?></td>
				 </tr>
				 <?php
				  }
				?>
			</table>
			</div>
		</div>
	</div>
	<!--<div class="row">
		<a href="manage/employee_page/logout.php" class="btn btn-success" style="margin:10px;">Logout</a>
	</div>-->
</div>
</body>
</html>
<?php
}
else{
	header("Location:index.php?error=UnAuthorized Access");
}
