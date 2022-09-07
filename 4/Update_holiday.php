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
    <title> Update Holiday </title>
    </head>
    <body style="background:url('p.png');
  background-repeat: no-repeat; background-color: #90B4E0 ;">
        <br>
        <br>
        <a href="http://localhost/4/admin.php">
	      <img src="logo_0.png" height="150" width="150" ></a>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      <center>
        <h2>Update Holiday</h2>
      </center>
        <br>
		<center>
		<div class = "container">
      <form method="post" action= "">
      <p><label> ID :
        <input type = "number" name ="id"></label>
      </p>
      <p><label>Type Of Absence:
       <input type = "text" name ="type_of_absence"></label></p>
       <p><label>Date:
         <input type = "Date" name="Date" />
            (yyyy-mm-dd)
          </label>
       </p>
       <p>
         <label>Admin Id:
           <input type = "number" name="admain_id"
           min = "0"
           max = "30"
           step = "1"
           value = "0" />
      <p>  <input type="submit" name="update" value="Update"></p>
       </form>
      <?php
//$connection = mysqli_connect("localhost","root","");
//$db=mysqli_select_db($connection,'fr');
if(isset($_POST['update']))
{
  $id = $_POST['id'];
  $Date = $_POST['Date'];
  $type = $_POST['type_of_absence'];
  $admain_id = $_POST['admain_id'];
  $query = "UPDATE public_holidays SET `Date`='$Date', `type_of_absence`='$type', `admain_id`= '$admain_id' WHERE `id`='$id'";
  $query_run = mysqli_query($con ,$query);
  if($query_run)
  {
    echo '<script type="text/javascript"> alert("Holiday updated successfully") </script>';
  }
  else
  {
    echo '<script type="text/javascript"> alert("Holiday was not updated successfully") </script>';
  }
}
?>

</div>
</center>
</body>
</html>
