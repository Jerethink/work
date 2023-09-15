<?php 
session_start();
?>



<?php 
include("controllers/dblink.php");

$msg ='';


if($_POST){
	$query= "SELECT * FROM admin Where user_name=? AND password=?";
	$user_name = $_POST["user_name"];
	$password = $_POST["password"];
	
	$result = $connection->prepare($query);
	$result->execute([$user_name,$password]);
	
	$admin = $result->fetchAll();

		if(count($admin)>0){
       $_SESSION['admin'] = $user_name;
      header("location:dashboard.php");
      
	}else{
		$msg = "Invalid Username or password";
  }
}
?>


<?php
		//if($msg){ ?>
			
			<div style="color:white; font-size:20px; text-align:center">
			<?php //echo $msg ?>
		
		<?php //} ?>
	
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jerry stores</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="public/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="public/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet"  href="sty.css">
</head>


<br><br><br>
<center>
        <div class="fom">
            <h2>Admin Login</h2>
<form method="post">
<?php
		if($msg){ ?>
			 
			<div style="color:white; font-size:20px; text-align:center">
			<?php echo $msg ?>
		
		<?php } ?>
                <input id="email" placeholder="Enter Username" name="user_name" size="40">
                <input id="text" type="password" placeholder="Password" required  name="password" size="40"><br><br><br>
                <button type="submit" class="btn btn-dark">Login</button>
            </form>

        </div>
    </center>

</form> 

</body>

</html>