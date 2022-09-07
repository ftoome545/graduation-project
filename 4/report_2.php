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
    <title> Employee Attendence Report </title>
    </head>
    <body style="background:url('p.png');
  background-repeat: no-repeat; background-color: #90B4E0 ;">
        <br>
        <br>
        <a href="http://localhost/4/admin.php">
	      <img src="logo_0.png" height="150" width="150" alt="logo" ></a>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      <center>
        <h2>Employee attendance report</h2>
      </center>
        <br>
		<center>
		<div class = "container">
		<form action ="" method = "POST">
		<input type = "text" name = "id" placeholder = "Enter ID"/>
		<input type = "submit" name = "search" value = "SEARCH">
		</form>
		<table>
		<tr>

                    <th>ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th>Absence Date</th>
                </tr><br>
                <?php
				//$connection = mysqli_connect("localhost","root","");
				//$db=mysqli_select_db($connection,'fr');
				if(isset($_POST['search']))
				{
				    $id = $_POST['id'];
				    $query = "SELECT * FROM `employee_absence`where id='$id'";
				    $query_run = mysqli_query($con ,$query) ;
				    while($row = mysqli_fetch_array($query_run))
				        {
					       ?>
					       <tr>
					            <td><?php echo $row['id']; ?> </td>
					            <td><?php echo $row['absence_date']; ?> </td>
				           </tr>
					       <?php
				         }
				}
				?>
				</table>
				</div>
        <br>
        <br>
        <br>
        <br>
        <!--<button name=""> <a href="http://localhost/4/employee.php">Back</a> </button>-->
				</center>
				</body>
				</html>
