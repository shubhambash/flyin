<?php
echo '
<!doctype html>
<html lang="en">
  <head>
        <!-- register css link -->
 
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/_footer.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">




    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">


<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Mukta:wght@600&display=swap" rel="stylesheet">


<!-- font awesome -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<!-- google fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Roboto:wght@300&family=Rubik:wght@300&display=swap" rel="stylesheet">
<style>
  *{
font-family: "Rubik", sans-serif;}

.wrap{


  
  background-image : linear-gradient(rgba(255,255,255,0.8), rgba(255,255,255,0.8)), url(images/doodle.png);
  background-position: center;
  background-size: 900px 900px;

}




</style>



    <title>Register</title>


    <style>

    .outline{
      border-style: solid;
      border-width: thin;
      border-color: gainsboro; border-radius: 3%;
      width: 40%;
  
      
      }


      .user {
        display: inline-block;
        width: 110px;
        height: 110px;
        border-radius: 50%;
      
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
      }

      .one {
        background-image: url(images/profile1.png);
      }


      @media screen and (max-width: 1060px) {
        .outline {
            width: 70% !important;
        }

      @media screen and (max-width: 800px) {
          .outline {
              width: 100% !important;
          }
     
    }


    </style>
  </head>
  <body><div class="wrap">';
   

    

include 'partials/_navbar.php';?>

        
 

<div class="container main">


  <div class="max-width-container">
  
    <div class="row">
    
    
      

      <div class="col-lg-5 offset-lg-7">
      
      <div class="formdiv">
      
      
      <h3 class="mt-4 mb-4"><b>Register and hire the best employees</b></h3>

      










        <form action="partials/_handle_employer_signup.php" class="employee" method ="post">
          <div class="mb-3">
            <label for="signupEmail" class="form-label">Email address (Official)</label>
            <input type="email" class="form-control" placeholder="Please enter official email e.g. adhere@business.com" id="signupEmail" name="signupEmail" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="signupPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="signupPassword" id="signupPassword" required>
          </div>

          <div class="mb-3">
            <label for="signupcPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="signupcPassword" id="signupcPassword" required>
          </div>

          
          <button type="submit" class="btn mt-4" style="background-color: #44859e; color: white;" >Register</button>
        </form>

    </div>
    </div>
    </div>
    </div>
    </div>




<div class="mt-5">


<?php

include 'partials/_footer.php';

?>

</div>


     

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


  </body>
</html>