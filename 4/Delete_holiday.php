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
    <title> Delete Holiday </title>
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
        <h2>Delete Holiday</h2>
      </center>
        <br>
		<center>
		<div class = "container">
      <form action="" method="post">
        <p><label> ID :
            <input type = "number" name ="id"></label>
        </p>
        <p>
          <input type="submit" name="Delete" value="DELETE">
          <input type="reset" value="Clear">
        </p>
      </form>
      <?php
//$connection = mysqli_connect("localhost","root","");
//$db=mysqli_select_db($connection,'fr');
if(isset($_POST['Delete']))
{
  $id = $_POST['id'];
  $query = "DELETE FROM public_holidays WHERE id=$id";
  $query_run = mysqli_query($con ,$query);
  if($query_run)
  {
    echo '<script type="text/javascript"> alert("Holiday deleted successfully") </script>';
  }
  else
  {
    echo '<script type="text/javascript"> alert("Holiday was not deleted successfully") </script>';
  }
}
?>

</div>
</center>
</body>
</html>
