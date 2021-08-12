
<!-- page for details of education -->

<?php

    include '../partials/_navbar.php';
    if(isset($_GET['userField']) == "alreadySet")
    {
      echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
      <strong>'. $_SESSION['useremail'] .' your details have already been saved</strong> <a href="user_resume_page2.php"> Proceed</a> with the resume</a>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }

    

?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <link rel="stylesheet" href="../css/user_resume_page.css">


        <!-- google fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Roboto:wght@300&family=Rubik:wght@300&display=swap" rel="stylesheet">
    <style>
      *{
font-family: 'Rubik', sans-serif;}


  
  


    </style>


    <title>Hello, world!</title>
  </head>
  <body>

<div class="container">

    <div class="max-width-container">





      <div class="row">
      
      <div class="col-md-3"></div>

      <div class="col-md-6 mt-5 mb-5 userDetails">
      
      

            <h3 class="text-center mt-5 mb-5">Education</h3>


              
              
             

            <div class="max-width-container education">
            


                <!-- links to modals -->

                <!-- link to graduation modal -->
                <p class="px-4 mt-4 mb-4"><button data-bs-toggle="modal" data-bs-target="#graduation" class="align-items-center" style="border:none; background-color:white;" onclick="">+ Add Graduation</button></p>
                <div class="container px-5">


                  
                      <!-- retrieving graduation details form DB and displaying them to the user -->
                      <?php 
                              include '../partials/_db-connection.php';
                             
                              $user_email = $_SESSION['useremail'];
                             
                              $sql1 = "SELECT * FROM `graduation_details` WHERE user_email='$user_email'";
                              $result1 = mysqli_query($conn, $sql1);

                              while($row = mysqli_fetch_assoc($result1))
                              {
                              $college_name =  $row['college'];
                              $start = $row['start_year'];
                              $end = $row['end year'];
                              $degree = $row['degree'];

                              echo "<p>".$college_name."</p>
                              <p>" . $degree . "</p>
                             <p>".$start." - ".$end." </p>";

                              
                          
                              }


                      ?>
                    



                </div>

                <!-- link to senior secondary modal -->
                <p class="px-4 mt-4 mb-4"><button data-bs-toggle="modal" data-bs-target="#seniorSecondary" class="align-items-center" style="border:none; background-color:white;">+ Add Higher Secondary (XII)</button></p>
                
                 <div class="container px-5">

                 <!-- displaying the data from DB stored for senior secondary -->
                    <?php 
                                  include '../partials/_db-connection.php';
                                
                                  $user_email = $_SESSION['useremail'];
                                
                                  $sql1 = "SELECT * FROM `senior_secondary_details` WHERE user_email='$user_email'";
                                  $result1 = mysqli_query($conn, $sql1);

                                  while($row = mysqli_fetch_assoc($result1))
                                  {
                                  $school_name =  $row['school_name'];
                                  $completion = $row['completion_year'];
                                  
                                  $board = $row['board'];

                                  echo "<p>".$school_name."</p>
                                <p>".$completion." </p>
                                <p>".$board."</p>";

                                  
                              
                                  }


                          ?>

                  </div>
                <!-- link to scondary modal -->
                <p class="px-4 mt-4 mb-4"><button data-bs-toggle="modal" data-bs-target="#secondary" class="align-items-center" style="border:none; background-color:white;">+ Add Secondary (X)</button></p>
                <div class="container px-5">
                  <!-- displaying the data from DB stored for  secondary (X)-->
                <?php 
                                  include '../partials/_db-connection.php';
                                
                                  $user_email = $_SESSION['useremail'];
                                
                                  $sql1 = "SELECT * FROM `secondary_details` WHERE user_email='$user_email'";
                                  $result1 = mysqli_query($conn, $sql1);

                                  while($row = mysqli_fetch_assoc($result1))
                                  {
                                  $school_name =  $row['school_name'];
                                  $completion = $row['year_of_completion'];
                                  
                                  $board = $row['board'];

                                  echo "<p>".$school_name."</p>
                                <p>".$completion." </p>
                                <p>".$board."</p>";

                                  
                              
                                  }


                          ?>


                          </div>
                
                
                <p class="px-4 mt-4 mb-4"><button data-bs-toggle="modal" data-bs-target="#diploma" class="align-items-center" style="border:none; background-color:white;">+ Add diploma</button></p>
                
                
                <div class="container px-5">

                <!-- displaying the data from DB stored for  Diploma-->
                <?php 
                                  include '../partials/_db-connection.php';
                                
                                  $user_email = $_SESSION['useremail'];
                                
                                  $sql1 = "SELECT * FROM `diploma_details` WHERE user_email='$user_email'";
                                  $result1 = mysqli_query($conn, $sql1);

                                  while($row = mysqli_fetch_assoc($result1))
                                  {
                                  $school_name =  $row['institute_name'];
                                  $start = $row['start_year'];
                                  $end = $row['end_year'];
                                  
                                  $field = $row['field'];

                                  echo "<p>".$school_name."</p>
                                <p>".$field." </p>
                                <p>".$start." - ". $end ."</p>";

                                  
                              
                                  }


                          ?>
                
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                <p class="px-4 mt-4 mb-4"><button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="align-items-center" style="border:none; background-color:white;">+ Add PhD</button></p>


           


          

 

            
            
            </div>
            <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
              
              
              <a role="button" href="user_resume_page4.php" id="proceedButton" class="btn btn-outline-primary" style="width: 137.69px;">Proceed</a>
            </div>
                           -->
                           <div class="row">
                                  
                                  <div class="col  "><div class="d-grid gap-2 justify-content-md-start mt-4 "><button type="button" class="btn btn-outline-primary" onclick="history.back()" style="width:137.69px;">return</button> </div>
                                  </div>
                                  <div class="col  "><div class="d-grid gap-2 justify-content-md-end mt-4 "><a role="button" class="btn btn-outline-primary" href="user_resume_page4.php" style="width:137.69px;">proceed</a> </div>
                                  </div>
                                  
                        </div>


           
                     </div>
          

            
      
      
      </div>

      <div class="col-md-3"></div>
      
      
      </div>
    


    
    </div>

</div>

 




 

    
<?php

include '../partials/user_resume/_graduationModal.php';
include '../partials/user_resume/_senior_secondaryModal.php';
include '../partials/user_resume/_secondaryModal.php';
include '../partials/user_resume/_diplomaModal.php';



?>


<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>




