
<?php include "controllers/dblink.php"; ?>

<?php   

$sql= "INSERT INTO users(first_name,last_name,email,password,date_of_birth) values(?,?,?,?,?)";
// the if statement next enable the form to be displayed without errors, even when it is empty. without it,there will be an error requesting that the values be entered.
    if ($_POST){
    $first_name= $_POST["first_name"];
    $last_name= $_POST["last_name"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    $date_of_birth= $_POST["date_of_birth"];
    $users= $connection->prepare($sql);
 
 
 
 // $connection above is from the imported file using the include statement
$workon= $users->execute([$first_name,$last_name,$email,$password,$date_of_birth]);
    if($workon) {
        echo "Your registration was suscessful !!!"."<br>";
        header("location:login.php");

        echo  "<a href= 'login.php'><button type='button' class='btn btn-dark btn-lg'>Login</button></a>";
  
    } else{
        echo "Data was not admitted into the database";

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
<body>
<form method="post">
    <center>
        <div class="fom">
            <h2>Fill in your details</h2>
            <form>
                <input id="text" placeholder="Enter your first name" name="first_name" size="40">
                <input id="text" placeholder="Enter your Surname" name="last_name" size="40">
                <input id="email" placeholder="Enter email" name="email" size="40">
                <input id="date"  type="date" name="date_of_birth" size="40">
                <input id="password" type="password" placeholder="Enter your password" name="password" size="40"><br><br>
                <button type="submit" class="btn btn-dark">Submit</button> <a href= "login.php"><h6>Have an account already ? login</h6></a>
            </form>

        </div>
    </center>
</form>
</body>
</html>