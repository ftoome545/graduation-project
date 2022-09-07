<?php
session_start();
include 'connect.php';

if(isset($_REQUEST['email']) && isset($_REQUEST['password'])){

	//mysqli real escape prevent from sql injection which filter the user input
	$email=mysqli_real_escape_string($con,$_REQUEST['email']);
	$password=mysqli_real_escape_string($con,$_REQUEST['password']);
	$qr=mysqli_query($con,"select * from employee where email='".$email."' and password='".$password."'");
	if(mysqli_num_rows($qr)>0){
		$data=mysqli_fetch_assoc($qr);
		$_SESSION['user_data']=$data;
		if($data['is_admin']==1){
			header("Location:admin.php");
		}
		else{
			header("Location:employee.php");
		}

	}
	else{
		header("Location:index.php?error=Invalid Login Details");
	}
}
else{
	header("Location:index.php?error=Please Enter Email and Password");
}
