<?php
session_start();
$con=mysqli_connect("localhost","root","","fr");
if(!$con){
	die("Failed to Establish Database Connection");

}
//include 'connect.php';
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['is_admin']!=1){
		header("Location:employee.php");
	}
}

?>
<html>
<head>
   <meta charset="utf-8">
<title>Add New Employee</title>
</head>
<body style="background-image:url('p.png'); background-repeat: no-repeat; background-color: #90B4E0 ;">
  <br>
  <br>
  <a href="http://localhost/4/admin.php">
	<img src="logo_0.png" height="150" width="150" ></a>
  <br>
  <br>
  <br>
  <br>
<center>
<form action="" method="POST" enctype="multipart/form-data">
  <h2>Add New Employee</h2>
  <p><label> Name :
      <input type = "text" name ="full_name"></label>
  </p>
  <p><label> Gender :
      <input type="radio" name ="Gender" value="m">male
      <input type="radio" name ="Gender" value="f">female
      </label>
    </p>
  <p><label> Password :
      <input type ="password" name = "Password"></label>
  </p>
  <p><label> Email :
      <input type ="email" name = "Email"></label>
  </p>
  <p><label> Social_id :
      <input type ="text" name = "social_id"></label>
<p>
 Image 1 :<input type ="file" name = "Img1"></label><br>
 Image 2 :<input type ="file" name = "Img2"></label><br>
 Image 3 :<input type ="file" name = "Img3"></label><br>
 Image 4 :<input type ="file" name = "Img4"></label><br>
 Image 5 :<input type ="file" name = "Img5"></label><br>
</p>
  <p><label> Absence_Days :
      <input type ="text" name = "absence_days"></label>
  </p>
  <p><label> Is_Admin :
      <input type ="text" name = "is_admin"></label>
  </p>
  <p>
    <input type="submit" name="Add" value="ADD">
    <input type="reset" value="Clear">
  </p>
</form>
   <?php
//$connection = mysqli_connect("localhost","root","");
//$db=mysqli_select_db($connection,'fr');
if(isset($_POST['Add']))
{
$name = $_POST['full_name'];
$gender = $_POST['Gender'];
$Password = $_POST['Password'];
$email = $_POST['Email'];
$so = $_POST['social_id'];
//First image
$filename = $_FILES['Img1']['name'];
$filetmpname = $_FILES['Img1']['tmp_name'];
$folder = "emp/".$filename;
move_uploaded_file($filetmpname, $folder.$filename);
//Second image
$filename_2 = $_FILES['Img2']['name'];
$filetmpname_2 = $_FILES['Img2']['tmp_name'];
$folder_2 = "emp/".$filename_2;
move_uploaded_file($filetmpname_2, $folder_2.$filename_2);
//Third image
$filename_3 = $_FILES['Img3']['name'];
$filetmpname_3 = $_FILES['Img3']['tmp_name'];
$folder_3 = "emp/".$filename_3;
move_uploaded_file($filetmpname_3, $folder_3.$filename_3);
//Forth image
$filename_4 = $_FILES['Img4']['name'];
$filetmpname_4 = $_FILES['Img4']['tmp_name'];
$folder_4 = "emp/".$filename_4;
move_uploaded_file($filetmpname_4, $folder_4.$filename_4);
//Fifth image
$filename_5 = $_FILES['Img5']['name'];
$filetmpname_5 = $_FILES['Img5']['tmp_name'];
$folder_5 = "emp/".$filename_5;
move_uploaded_file($filetmpname_5, $folder_5.$filename_5);
$absence = $_POST['absence_days'];
$admin = $_POST['is_admin'];
$query = "INSERT INTO `employee` (`full_name`, `Gender`, `Password`, `Email`, `social_id`, `Img1`, `Img2`, `Img3`, `Img4`, `Img5`,  `absence_days`, `is_admin`)
VALUES ('$name', '$gender', '$Password', '$email', '$so', '$folder ', '$folder_2', '$folder_3', '$folder_4', '$folder_5', '$absence', '$admin');";
$query_run = mysqli_query($con ,$query);
if($query_run)
{
 echo '<script type="text/javascript"> alert("New Employee Added Successfully") </script>';
}
else
{
 echo '<script type="text/javascript"> alert("Employee has not been added") </script>';
}
}
?>
</center>
</body>
</html>
