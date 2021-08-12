
<!-- page for basic user details -->

<?php

    include '../partials/_navbar.php';
    if(isset($_GET['userName']) && $_GET['userName'] == "alreadySet")
    {
      echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
      <strong>'. $_SESSION['useremail'] .' your details have already been saved</strong> <a href="../user_resume_pages/user_resume_page1.php?reenter=true">Re-enter details?</a> or <a href="user_resume_page2.php">Proceed</a> with the resume</a>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    if(isset($_GET['userContact']) && $_GET['userContact'] == "alreadyUsed")
    {
      echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
      <strong>'. $_SESSION['useremail'] .' The contact entered already exists</strong>  
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    if(isset($_GET['reenter']) && $_GET['reenter'] == "true")
    {
      
      include '../partials/_db-connection.php';
      $user_email = $_SESSION['useremail'];
      

      $sql = "DELETE FROM `user_resume_basic_details` WHERE user_email='$user_email'";
      $result = mysqli_query($conn, $sql);

        
      

    }

?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

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
 


    <title>Hello, world!</title>
  </head>
  <body>
  <?php 

    

  ?>
<div class="container">

    <div class="max-width-container">





      <div class="row">
      
      <div class="col-md-3"></div>

      <div class="col-md-6 mt-5 mb-5 userDetails">
      
            <?php  if(isset($_GET['NewUser']) && $_GET['NewUser'] == "true")
            {
                echo '<h4 class="text-center pt-5 pb-2">Let\'s Build Your Resume First!</h4><p class="text-center pb-4">It only takes a few minutes</p> ';
            }  ?>
      
        <form action="../partials/user_resume/_handleResume.php" method="post">

          <div class="row">
          
              <div class="col-md-2">
                  <label for="etc" class="pb-2">Title</label>
                  <select class="form-select" name="title">
                    
                    <option value="1">Mr.</option>
                    <option value="2">Mrs.</option>
                    <option value="3">Ms.</option>
                  </select>

              </div>
            
              <div class="col-md-5">

                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                    <input  class="form-control" id="exampleInputEmail1" name="firstName">

              </div>

              <div class="col-md-5">

                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                    <input  class="form-control" id="exampleInputEmail1" name="lastName">

              </div>
          </div>


          <div class="row py-3">
          
            <div class="col-md-1">+91</div>

            <div class="col-md-11">
            <input  class="form-control" id="exampleInputEmail1"  placeholder="enter mobile number" name="contact">
            </div>
          
          </div>


            <div class="py-3">
              <label for="exampleInputEmail1" class="form-label">Current City</label>
              <input  class="form-control" id="exampleInputEmail1" name="currentAddressOne">
            </div>

            <div class="py-3">
              <label for="exampleInputEmail1" class="form-label">Additional City</label>
              <input  class="form-control" id="exampleInputEmail1"  name="currentAddressTwo">
            </div>
          




        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <!-- <button class="btn btn-primary me-md-2" type="button">Button</button> -->
              
              <button type="submit" class="btn btn-success">Save & Proceed</button>
            </div>
        </form>

      
      
      </div>

      <div class="col-md-3"></div>
      
      
      </div>
    


    
    </div>

</div>

 

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>




