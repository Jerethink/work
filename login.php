<?php 
session_start();
?>

<?php 
require_once("controllers/dblink.php");
$msg ='';
if($_POST){
	$query= "SELECT * FROM users Where email=? AND password=?";
	$password = $_POST["password"];
	$email = $_POST["email"];
	
	$result = $connection->prepare($query);
	$result->execute([$email,$password]);
	
	$user = $result->fetchAll();

		if(count($user)>0){
       $_SESSION['user'] = $email;
      header("location:payment.php");
      
	}else{
		$msg = "Invalid email or password";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Jerry Store</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesoeet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link rel="stylesheet"  href="sty.css">
</head>
<body style>
<br>
<br>

<form method="post">

	
<center>
        <div class="fom">
            <h2> Login</h2>
<form method="post">
<?php
		if($msg){ ?>
			 
			<div style="color:black; font-size:20px; text-align:center">
			<?php echo $msg ?>
		
		<?php } ?>
                <input id="email" placeholder="Enter email" name="email" size="40">
                <input id="text" type="password" placeholder="Password" required  name="password" size="40"><br><br><br>
                <button type="submit" class="btn btn-dark">Login</button>
                <a href= "signup.php"><h6 style="text-align: center;">Don't have an account ? sign up</h6></a>

            </form>

        </div>
    </center>

</form> 
</body>

</html>