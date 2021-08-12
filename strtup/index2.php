<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Roboto:wght@300&family=Rubik:wght@300&display=swap" rel="stylesheet">
    <style>
      *{
font-family: 'Rubik', sans-serif;}


  body{


  
background-image : linear-gradient(rgba(255,255,255,0.95), rgba(255,255,255,0.95)), url(images/doodle.png);
background-position: center;
background-size: 900px 900px;

}
  
  


    </style>


    <title>Job Portal</title>
  </head>
  <body>
 


<!-- navbar  -->

 <?php 
 include 'partials/_navbar2.php';
 include 'partials/_db-connection.php';


 


 ?>




<!-- carousel starts here -->


<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
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
      <img src="https://source.unsplash.com/1600x500/?work,business" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1600x500/?office,keyboard" class="d-block w-100" alt="...">
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
</div>





<?php
    $user_email = $_SESSION['useremail'];

    $sql = "SELECT * FROM `users` WHERE user_email='$user_email'";
    $result = mysqli_query($conn, $sql);


    // if user has not entered basic details then show a button leading to the details form
    if($result)
    {
        $row = mysqli_fetch_assoc($result);
        if($row['is_employer'] == 0)
        {
            echo '<h1 class="text-center mt-5">404</h1><p class="text-center mt-4">page not found</p>';
            exit();
        }
        if($row['filled_resume'] == 0)
        {
            include 'partials/employer_details/_basicDetailsModal.php';
            echo '<div class="text-center"><button type="button" class="btn mt-5 " style="background-color: #44859e; color: white;" data-bs-toggle="modal" data-bs-target="#basicEmployerDetail">Get Started</button></div>';
        }
        else{
            echo '<div class="container">

            <div class="row text-center">
            
                <div class="col-md-6 text-center mt-5">
                    <a role="button" href="posted_jobs_pages/post_a_job.php" style="background-color: #44859e; color: white;" class="btn btn-primary text-center">Post a job</a>
                </div>
        
                <div class="col-md-6 mt-5">
                    <a role="button" href="posted_jobs_pages/posted_jobs.php" style="background-color: #44859e; color: white;"  class="btn btn-primary text-center">view posted jobs</a>
                </div>
            
            </div>
        
        </div>
        ';
        }

        
    }






?>



<!-- scripts -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  

  
  </body>
</html>



























