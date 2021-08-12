<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


  <!-- font awesome -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<!-- css for footer -->
    <link rel="stylesheet" href="css/_footer.css">


    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Roboto:wght@300&family=Rubik:wght@300&display=swap" rel="stylesheet">
    <style>
      *{
font-family: 'Rubik', sans-serif;}


  .wrap{


  
background-image : linear-gradient(rgba(255,255,255,0.95), rgba(255,255,255,0.95)), url(images/doodle.png);
background-position: center;
background-size: 900px 900px;

}
  
  


    </style>

<!-- css for footer -->
<link rel="stylesheet" href="css/__search.css">


<!-- <link rel="stylesheet" href="css/style.css"> -->


    <title>Flyin Jobs</title>



 
  </head>
  <body>
 

<div class="wrap">
<!-- navbar  -->

 <?php 
 include 'partials/_navbar.php';
 include 'partials/_db-connection.php';


 ?>


<!-- 1068584278078-6rs7r6n7fv8qmj5r6473g8pqhsqr0t0v.apps.googleusercontent.com -->


<!-- 43KpNXXcka6N2fXFUF4IvqpZ -->



<!-- carousel starts here -->


<!-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://source.unsplash.com/1600x500/?money,job" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1600x500/?internship,books" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1600x500/?study,job" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div> -->




<!-- search bar -->


<div class="container">
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="search"> <i class="fa fa-search"></i><form action="display.php?search" method="POST"> <input type="search" name="search" class="form-control" placeholder="Search for category e.g. marketing"> <button type="submit" class="btn">Search</button> </form></div>
        </div>
    </div>
</div>







<!--Categories -->


<h3 class="text-center mt-5 mb-5 pb-5"><strong>Popular Categories</strong></h3>


<!-- cards goes here -->
<div class="container-fluid">

    <div class="row mx-3 mb-5 pb-5">

   
<?php 

$sql = "SELECT * FROM `categories` WHERE 1 LIMIT 6";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result))
{

    $name  = $row['category_name'];

 

    echo '

    <div class="card my-3 mx-auto" style="width: 10rem;">
        <a href="joblist.php?search='. $name .'"><img src="https://source.unsplash.com/1200x500/?'. $name  .',job" class="card-img-top" alt="unable to load"></a>
            <div class="card-body">
               <p class="card-text text-center">'.  $name  .'</p></div></div>';

            
          
}



?>









      

    </div>

</div>






<?php

include 'partials/_footer.php';

?>


<!-- scripts -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  
</div>
  
  </body>
</html>



























