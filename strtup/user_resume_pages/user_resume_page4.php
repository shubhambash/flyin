
<!-- page for details of experience -->

<?php

    include '../partials/_navbar.php';
    if(isset($_GET['userField']) && $_GET['userField'] == "alreadySet")
    {
      echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
      <strong>'. $_SESSION['useremail'] .' your details have already been saved</strong> <a href="#">Edit details? or <a href="user_resume_page2.php">Proceed</a> with the resume</a>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }

    if(isset($_GET['userField']) && $_GET['userField']== "set")
    {
      echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
      <strong>Details Saved!</strong> <a href="#"> Edit details? </a>or<a href="user_resume_page2.php"> Proceed</a> with the resume</a>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    if(isset($_GET['error']) && $_GET['error'] =="reEnterData")
    {
      echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
      <strong>An Error Occured</strong>  Please re-enter your details
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


  .wrap{


  
background-image : linear-gradient(rgba(255,255,255,0.95), rgba(255,255,255,0.95)), url(images/doodle.png);
background-position: center;
background-size: 900px 900px;

}
  
  


    </style>


    <title>Hello, world!</title>
  </head>
  <body>





<div class="container">

    <div class="max-width-container">





      <div class="row">
      
      <div class="col-md-3"></div>

      <div class="col-md-6 mt-5 mb-5 userDetails">
      
      

            <h3 class="text-center mt-5 mb-5">Experience</h3>

            <div class="max-width-container education">
            


                <!-- links to modals -->


                <!-- link to job experience/previous jobs  Modal -->
                <p class="px-4 mt-4 mb-4"><button data-bs-toggle="modal" data-bs-target="#jobExperience" class="align-items-center" style="border:none; background-color:white;" >+ Add previous jobs</button></p>
                 <?php include '../partials/user_resume/_previousJobsModal.php'; ?>
                  <div class="container px-5">
                  <!-- retrieving previous jobs details form DB and displaying them to the user -->
                <?php 
                              include '../partials/_db-connection.php';
                             
                              $user_email = $_SESSION['useremail'];
                             
                              $sql1 = "SELECT * FROM `job_experience_details` WHERE user_email='$user_email'";
                              $result1 = mysqli_query($conn, $sql1);

                              while($row = mysqli_fetch_assoc($result1))
                              {

                              $title1=  $row['title1'];
                              $companyName1 = $row['company_name1'];

                              $title2 = $row['title2'];
                              $companyName2 = $row['company_name2'];


                              $title3 = $row['title3'];
                              $companyName3 = $row['company_name3'];
                           

                              echo "<p>".$companyName1."</p>

                              <div class='px-3'>
                             
                              <p>".$title1."</p>

                                

                              </div>";

                              echo "<p>".$companyName2."</p>

                              <div class='px-3'>
                             
                              <p>".$title2."</p>

                                

                              </div>";

                              echo "<p>".$companyName3."</p>

                              <div class='px-3'>
                             
                              <p>".$title3."</p>

                                

                              </div>";

                              
                          
                              }


                      ?>
                      
            </div>

                <!-- link to internship experience/previous internships  Modal -->
                <p class="px-4 mt-4 mb-4"><button data-bs-toggle="modal" data-bs-target="#internshipExperience" class="align-items-center" style="border:none; background-color:white;">+ Add previous internships</button></p>
                
                <?php include '../partials/user_resume/_previousInternshipsModal.php'; ?>
                
                <div class="container px-5">
                  <!-- retrieving previous internship details form DB and displaying them to the user -->
                <?php 
                              include '../partials/_db-connection.php';
                             
                              $user_email = $_SESSION['useremail'];
                             
                              $sql1 = "SELECT * FROM `internship_experience_details` WHERE user_email='$user_email'";
                              $result1 = mysqli_query($conn, $sql1);

                              while($row = mysqli_fetch_assoc($result1))
                              {

                              $title1=  $row['title1'];
                              $companyName1 = $row['company_name1'];

                              $title2=  $row['title2'];
                              $companyName2 = $row['company_name2'];

                              $title3=  $row['title3'];
                              $companyName3 = $row['company_name3'];
                           

                              echo "<p>".$companyName1."</p>

                              <div class='px-3'>
                             
                              <p>".$title1."</p>
                              </div>";

                              echo "<p>".$companyName2."</p>

                              <div class='px-3'>
                             
                              <p>".$title2."</p>
                              </div>";

                              echo "<p>".$companyName3."</p>

                              <div class='px-3'>
                             
                              <p>".$title3."</p>
                              </div>";

                              
                          
                              }


                      ?>
                      </div>
                      

                <!-- link to PR experience  Modal -->
                <p class="px-4 mt-4 mb-4"><button data-bs-toggle="modal" data-bs-target="#prExperience" class="align-items-center" style="border:none; background-color:white;">+ Add position of responsibility</button></p>
                <?php include '../partials/user_resume/_prExperienceModal.php'; ?>
                
                <!-- retrieving previous pr details form DB and displaying them to the user -->
                                  
                              <div class="container px-5">
                                  <?php 
                              include '../partials/_db-connection.php';
                             
                              $user_email = $_SESSION['useremail'];
                             
                              $sql1 = "SELECT * FROM `pr_experience_details` WHERE user_email='$user_email'";
                              $result1 = mysqli_query($conn, $sql1);

                              while($row = mysqli_fetch_assoc($result1))
                              {

                              $title1=  $row['title1'];
                              $companyName1 = $row['company_name1'];

                              $title2=  $row['title2'];
                              $companyName2 = $row['company_name2'];

                              $title3=  $row['title3'];
                              $companyName3 = $row['company_name3'];
                           

                              echo "<p>".$companyName1."</p>


                              <div class='px-3'>
                             
                              <p>".$title1."</p>
                              </div>";


                              echo "<p>".$companyName2."</p>


                              <div class='px-3'>
                             
                              <p>".$title2."</p>
                              </div>";

                              echo "<p>".$companyName3."</p>


                              <div class='px-3'>
                             
                              <p>".$title3."</p>
                              </div>";

                              
                          
                              }


                      ?>
                      </div>

              
                
                <p class="px-4 mt-4 mb-4"><button data-bs-toggle="modal" data-bs-target="#trainingDetails" class="align-items-center" style="border:none; background-color:white;">+ Add trainings/extra courses</button></p>

                                        
               
                               <!-- retrieving previous trainings/courses details form DB and displaying them to the user -->
                                  
                               <div class="container px-5">
                                  <?php 
                              include '../partials/_db-connection.php';
                             
                              $user_email = $_SESSION['useremail'];
                             
                              $sql1 = "SELECT * FROM `trainings_details` WHERE user_email='$user_email'";
                              $result1 = mysqli_query($conn, $sql1);

                              while($row = mysqli_fetch_assoc($result1))
                              {
                                if(isset($row['training_title1']))
                                {
                                  $title1=  $row['training_title1'];
                                  $companyName1 = $row['training_organization1'];
                                  $start_date1 = $row['start_date1'];
                                  $end_date1 = $row['end_date1'];
                                }
                                else 
                                {
                                  $start_date1 =  "";
                                  $end_date1 = "";
                                }
                             
                              if(isset($row['training_title2']))
                              {
                                $title2=  $row['training_title2'];
                                $companyName2 = $row['training_organization2'];
                                $start_date2 = $row['start_date2'];
                                $end_date2 = $row['end_date2'];
                              }
                              else 
                              {
                                $start_date2 =  "";
                                  $end_date2 = "";
                              }
                             

                              if(isset($row['training_title3']))
                              {
                                $title3=  $row['training_title3'];
                                $companyName3 = $row['training_organization3'];
                                $start_date3 = $row['start_date3'];
                                $end_date3 = $row['end_date3'];
                              }
                              else 
                              {
                                $start_date3 =  "";
                                  $end_date3 = "";
                              }
                           
                              if(isset($row['training_title4']))
                              {
                                $title4 =  $row['training_title4'];
                                $companyName4 = $row['training_organization4'];
                                $start_date4 = $row['start_date4'];
                                $end_date4 = $row['end_date4'];
                              }
                              else 
                              {
                                $start_date4 =  "";
                                  $end_date4 = "";
                              }
                            
                           

                              echo "<p>".$companyName1."</p>


                              <div class='px-3'>
                             
                              <p>".$title1."</p>
                              
                              </div>";

                              echo "<p>".$companyName2."</p>


                              <div class='px-3'>
                             
                              <p>".$title2."</p>
                              
                              </div>";


                              echo "<p>".$companyName3."</p>


                              <div class='px-3'>
                             
                              <p>".$title3."</p>
                              
                              </div>";


                              echo "<p>".$companyName4."</p>


                              <div class='px-3'>
                             
                              <p>".$title4."</p>
                              
                              </div>";
                      

                              
                          
                              }


                      ?>
                      </div>

               
               
               
               

          
               
               
               
                      <p class="px-4 mt-4 mb-4"><button data-bs-toggle="modal" data-bs-target="#projectDetails" class="align-items-center" style="border:none; background-color:white;">+ Add projects</button></p>

          <?php

              include '../partials/user_resume/_projectDetailsModal.php';

          ?>
                </div>

          
 

            
            
  

            


            <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
              <a role="button" href="user_resume_page5.php" id="proceedButton" class="btn btn-outline-primary" style="width: 137.69px;">Proceed</a>
             
            </div> -->
         
      
      
      </div>

      <div class="row mt-2">
                                  
                                  <div class="col  "><div class="d-grid gap-2 justify-content-md-start mt-4 "><button type="button" class="btn btn-outline-primary" onclick="history.back()" style="width:137.69px;">return</button> </div>
                                  </div>
                                  <div class="col  "><div class="d-grid gap-2 justify-content-md-end mt-4 "><a role="button" class="btn btn-outline-primary" href="user_resume_page5.php" style="width:137.69px;">proceed</a> </div>
                                  </div>
                                  
            </div>

      <div class="col-md-3"></div>
      
      
      </div>
    


    
    </div>

</div>

 
<?php

include '../partials/user_resume/_trainingDetailsModal.php';


?>
 




 <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>




