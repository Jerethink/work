<?php 
session_start();
?>

<?php 

include("../controllers/dblink.php");

?>


<?php 

if ($_POST){


$target_dir = "../items_images/";
$target_file = $target_dir . basename($_FILES["images"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
 if(isset($_POST["submit"])) {
 $check = getimagesize($_FILES["images"]["tmp_name"]);
 if($check !== false) {
   echo "File is an image - " . $check["mime"] . ".";
   $uploadOk = 1;
 } else {
   echo "File is not an image.";
   $uploadOk = 0;
 }
 }


 if (file_exists($target_file)) {
 echo "Sorry, file already exists.";
 $uploadOk = 0;
 }


 if ($_FILES["images"]["size"] > 500000) {
 echo "Sorry, your file is too large.";
 $uploadOk = 0;
 }


 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
 && $imageFileType != "gif" ) {
 echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
 $uploadOk = 0;
 }


 if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
   echo "The file ". htmlspecialchars( basename( $_FILES["images"]["name"])). " has been uploaded.";
  

 }
}
 

?>



<?php

$sql= "INSERT INTO products(images,heading,price,details) values(?,?,?,?)";

$errors= [];

    if ($_POST){
    
    $heading= $_POST["heading"];
    $price= $_POST["price"];
    $details= $_POST["details"];
    $images= $_FILES["images"]["name"];
    $products= $connection->prepare($sql);
  
    
    ?>
    

 <?php // $connection above is from the imported file using the include statement
    $workon= $products->execute([$images,$heading,$price,$details]); ?>
 <?php   if($workon) {
  header("location:../dashboard.php");
  

        
    } else{
        echo "Item was not admitted into the database";

    }
}   



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
      <!-- style css -->
      
      <!-- Responsive-->
      <link rel="stylesheet" href="../css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="../images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="../css/owl.carousel.min.css">
      <link rel="stylesoeet" href="../css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

      
      <link rel="stylesheet" type="text/css" href="../css/style.css">
      <link rel="stylesheet"  href="../sty.css">
  </head>
<body>
<hr>
<strong><a href="../index.php"><h1 style="color:rgb(16,20,25); font-size:3rem"> J S</h1></a></strong>

<h1 style="background-color:rgb(16,20,25); text-align:center; margin:50px; color:white; border-radius:25px"> Add New Products</h1>
<hr>

<form style="margin:100px" method="post" enctype="multipart/form-data" >
        
        <label for="title">Product's Name:</label>
        <input class="form-control" type="text" name="heading" id="name" width="45px" >
        
        <label for="title">Price:</label>
        <input class="form-control" type="text" name="price" id="name" width="45px" >
        
        <br>
        <label for="body">Product's Description:</label>
        <textarea name="details" id="content" type="text" class="form-control"  rows="" cols="10"></textarea>



        
        <label class="form-label" width:90px;>Product's Image</label><br>
        <input class="form-group" type="file" aria-describedby="emailHelp" name="images">
    

        
        <br>
        <input class="btn btn-sm btn-success" type="submit" value="Upload Products">
    </form>
    





<div class="container">
    <div class="row">
        <div class="col-md-5">


             
             
    
  
               

      </div>
  
  </div>

</div>

  <div class="container">
    <div class="row">
        <div class="col-md-5">

        </div>
         
      
      </div>
  
    </div>

</div>


<div class="container">
    <div class="row">
        <div class="col-md-5">

        </div>
         
      
      </div>
  
    </div>

</div>


</form>

 </html>
</body>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>


