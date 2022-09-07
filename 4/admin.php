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
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="1.css">
</head>
<body style="background-image:url('p.png'); background-repeat: no-repeat; background-color: #90B4E0 ; ">
  <br>
  <br>
  <a href="http://localhost/4/admin.php">
	<img src="logo_0.png" height="150" width="150" ></a>
<?php
echo"
     <br>
     <br>
     <br>
     <br>
     <br>
<div class='employee_accounts'>
        <h2>Manage employee accounts</h2>
        <ul>
          <li>
            <p><a href='add_new_employee.php'><h3>Add new employee</h3></a></p>
          </li>
          <li>
            <p><a href='Update_employee.php'><h3>Update employee data</h3></a></p>
          </li>
          <li>
            <p><a href='Delete_emp.php'><h3>Delete employee</h3></a></p>
          </li>
        </ul>
      </div>
      <div class='holidays'>
        <h2>Manage public holidays</h2>
        <ul>
          <li>
            <p><a href='add_holiday.php'><h3>Add holiday</h3></a></p>
          </li>
          <li>
            <p><a href='Update_holiday.php'><h3>Update holiday</h3></a></p>
          </li>
          <li>
            <p><a href='Delete_holiday.php'><h3>Delete holiday</h3></a></p>
          </li>
        </ul>
      </div>";
echo "<div class='report'>
        <p><a href='report_2.php'><h2>Employee attendence report</h2></a></p>

      </div>";
//  <form method='post'><input type='submit' value='Logout' name='logout'></form> in line 55
?>
 <button name=""> <a href="logout.php">Logout</a> </button>
</body>
</html>
