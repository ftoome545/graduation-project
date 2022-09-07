<?php
session_start();
$con=mysqli_connect("localhost","root","","fr");
if(!$con){
	die("Failed to Establish Database Connection");

}
//include 'connect.php';
//include('connect.php');
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['is_admin']!=0){
		header("Location:admin.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>

</head>
<body style="background:url('p.png');
background-repeat: no-repeat; background-color: #90B4E0 ;">
		<br>
		<br>
		<a href="http://localhost/4/employee.php">
		<img src="logo_0.png" height="150" width="150" ></a>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
<?php
echo '
    <br>
    <br>
    <br>
    <br>';
echo "<center>";
echo "<h2>Home Page</h2><br/><br/>";
echo "<a href='PersonalInfo.php'>personal information</a><br/><br/>";
echo "<a href='AttendanceReport.php'>Attendance Report</a><br/><br/>";

//echo "<form method='post'><input type='submit' value='Logout' name='logout'></form>";
echo "</center>";

?>
<center>
<button name=""> <a href="logout.php">Logout</a> </button>
</center>
</body>
</html>
