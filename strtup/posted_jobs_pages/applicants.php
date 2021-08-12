<?php 
 include '../partials/_navbar2.php';
 include '../partials/_db-connection.php';

?>

<!--  shows all the applicants for the given job_id-->

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



    <title>Applicants</title>
  </head>
  <body>
 


<!-- navbar  -->


<!-- first check if the job_id sent as query belongs to a job posted by the current session user/employer -->



<?php


if(!$_SESSION['loggedin'])
{
  echo '<h1 class="text-center mt-5">Please <a href="../login_signup_page.php?login=true">Login</a> First</h1>';
  exit();
}

if(!isset($_GET['job_id']))
{
  echo '<h1 class="text-center mt-5">404</h1><p class="text-center mt-4">Page not found</p>';
  exit();
}


$user_email = $_SESSION['useremail'];
$job_id = $_GET['job_id'];

$sql = "SELECT * FROM job_details WHERE job_id='$job_id'";
$result = mysqli_query($conn, $sql);

if(!$result)
{
  echo '<h1 class="text-center mt-5">404</h1><p class="text-center mt-4">Page not found</p>';
  exit();
}

$row = mysqli_fetch_assoc($result);
if(!isset($row['user_email']))
{
  echo '<h1 class="text-center mt-5">404</h1><p class="text-center mt-4">Page not found</p>';
  exit();
}
if($row['user_email'] != $user_email)
{
    echo '<h1 class="text-center mt-5">404</h1><p class="text-center mt-4">Page not found</p>';
    exit();
}




$sql = "SELECT * FROM applicants WHERE job_id='$job_id'";
$result = mysqli_query($conn, $sql);

if(!$result)
{

  echo '<h1 class="text-center mt-5">404</h1><p class="text-center mt-4">Page not found</p>';
  exit();

}
$count = 1;
while($row = mysqli_fetch_assoc($result))
{
    $first_name = $row['user_first_name'];
    $last_name = $row['user_last_name'];
    $user_email = $row['user_email'];

    echo '<div class="row  mt-4">
    
    <div class="col-lg-10 offset-lg-2"><h4 class="mt-5">
    
    '. $count++ .') <strong>'. $first_name .'&nbsp&nbsp '. $last_name .'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'. $user_email .'</strong> <a role="button" href="../user_resume_pages/view_resume.php?email='. $user_email .'" class="btn btn-primary btn-sm mx-4">resume</button> <a role="button" class="btn btn-primary btn-sm mx-4">shortlist</a></h4>
    
    
    
    </div></div>';

}


?>

 



 



<!-- scripts -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  

  
  </body>
</html>



























