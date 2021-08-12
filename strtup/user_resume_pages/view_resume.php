<!-- Resume Page / Final/ for the employee/user-->






<?php
include '../partials/_navbar.php';
if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true)
{
 header("Location:../login_signup_page.php?login=true");
 exit();
}


 







?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <link rel="stylesheet" href="../css/user_resume_page.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>





    <title>Applicants Resume</title>



   <?php
   
   
   

   ?>

  </head>
  <body>

  <div class="container">

<div class="max-width-container">


<div class="row">



<div class="col-md-2"></div>


<div class="col-md-8">



                   
                    <div class="education px-4 my-5">
                    <br><br>
                    

<?php 

                // establish connection with the database

                include '../partials/_db-connection.php';
                
              
                //check if query has been sent

                if(!isset($_GET['email']))
                {
                    echo '<h1 class="mt-4">404</h1> Not Found!</h1>';
                    exit();
                }


                $user_email = $_GET['email'];
                $sql = "SELECT * FROM `user_resume_basic_details` WHERE user_email='$user_email'";
                $result = mysqli_query($conn, $sql);

                if(!$result)
                {
          
                    header("Location:../404.php");
                    exit();
                }

                echo '<h2 class="text-center">Resume</h2>';


                while($row = mysqli_fetch_assoc($result))
                {
                    $firstname = $row['user_first_name'];
                    $lastname = $row['user_last_name'];
                    $contact = $row['user_contact'];
                    $address = $row['current_address_one'];
                    $address_two = $row['current_address_two'];
                

                echo'<h2>'. $firstname .' '. $lastname .'</h2>';
                echo '  <div class="row">
                    
                <div class="col-md-4">+977-'. $contact .'</div>
                <div class="col-md-6">Email: '. $user_email .'</div>
            
            </div>';
            echo '                    <div class="row mt-2">
                    
            
            <div class="col-md-6">'. $address .'</div>
            <div class="col-md-4">'. $address_two .'</div>
        
            </div>';

            echo ' <hr>
            <br>';

                } ?>
                    
                  


                   








                <!-- graduation details -->
                    <div class="row mt-3 mb-3">
                    <div class="col-md-5">Education</div>
                    <div class="col-md-5">
                <?php 

                $sql = "SELECT * FROM `graduation_details` WHERE user_email='$user_email'";
                $result = mysqli_query($conn, $sql);
                $collegeName = "";

                    while($row = mysqli_fetch_assoc($result))
                    {

                        

                        $collegeName = $row['college'];
                        $start = $row['start_year'];
                        $end = $row['end year'];
                        $degree = $row['degree'];
                        $stream = $row['stream'];

                        
                        echo ' 
                        
                        <p class="fw-bold">'. $degree .' '. $stream .'</p>
                        <p>'. $collegeName .'</p>
                        <p>'. $start .' - '. $end .'</p>
                        <p>'. $degree .'</p>
                        ';

                    } 

                    if($collegeName == "")
                    {
                        $showOptions = 0;
                    }
                    else 
                    {
                        $showOptions = 1;
                    }

                    echo '</div>';
                    

                    
                    ?>
                    <!-- include graduation modal so that user can edit data -->
                    <?php 

                            include '../partials/user_resume/_editgraduationModal.php';

                    ?>

                    
                    </div>








                        <!-- senior secondary details -->
                    <div class="row">
                    
                            <div class="col-md-5"></div>




                            <div class="col-md-5">
                            
                         <?php 

                            $sql = "SELECT * FROM `senior_secondary_details` WHERE user_email='$user_email'";
                            $result = mysqli_query($conn, $sql);
                            $schoolName = "";
                            

                            while($row = mysqli_fetch_assoc($result))
                            {
                                

                                $schoolName = $row['school_name'];
                                $stream = $row['stream'];
                                $board = $row['board'];
                                

                                

                               

                            

                                echo '<br><p>Grade XII or equivalent</p><p>'. $schoolName .'</p>
                                <p>'. $board .', ' . $stream . '</p>';

                                
                            } 
                            

                            // if record is empty then do not display the edit and delete icon 
                            if($schoolName == "")
                                {
                                    $showOptions = 0;
                                }
                                else 
                                {
                                    $showOptions = 1;
                                }
                            
                                echo ' </div>';
                          

                            include '../partials/user_resume/_editseniorSecondaryModal.php';

                            

                            ?>

                            





                        
                                                        
  

                    
                    </div>
                    
                    
                       
           



                    <!-- secondary details -->
                    <div class="row">
                    
                    <div class="col-md-5"></div>




                    <div class="col-md-5">
                    
                 <?php 

                    $sql = "SELECT * FROM `secondary_details` WHERE user_email='$user_email'";
                    $result = mysqli_query($conn, $sql);
                    $schoolName = "";
                    

                    while($row = mysqli_fetch_assoc($result))
                    {
                        

                        $schoolName = $row['school_name'];
                       
                        $board = $row['board'];
                        

                        

                       

                    

                        echo '<br><p>Grade X or equivalent</p><p>'. $schoolName .'</p>
                        <p>'. $board .'</p>';

                        
                    } 
                   

                    // if record is empty then do not display the edit and delete icon 
                    if($schoolName == "")
                        {
                            $showOptions = 0;
                        }
                        else 
                        {
                            $showOptions = 1;
                        }
                    

                  
                        echo '                            </div>';




                       

                    include '../partials/user_resume/_editsecondaryModal.php';

                    echo ' <hr>
            <br>';

                    ?>

                    

                    </div>



      





             











                    <!-- jobs details -->


                    <div class="row mt-3 mb-3">
                    <div class="col-md-5">Jobs</div>
                    <?php
                    
                    $sql = "SELECT * FROM `job_experience_details` WHERE user_email='$user_email'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        if(isset($row['title1']))
                        {
                            $title1 = $row['title1'];
                            $company_name1 = $row['company_name1'];
                        }
                       
                        if(isset($row['title2']))
                        {
                            $title2 = $row['title2'];
                            $company_name2 = $row['company_name2'];
                        }
                        if(isset($row['title3']))
                        {
                            $title3 = $row['title3'];
                            $company_name3 = $row['company_name3'];
                        
                        }
                      


                       echo '
                       <div class="col-md-5"><p class="pb-2">'. $title1 .'     '. $company_name1 .'</p>
                       <p class="pb-2">'. $title2 .'  '. $company_name2 .'</p>
                       <p class="pb-2">'. $title3 .'   '. $company_name3 .'</p>';


                      
                          
                       
                       echo '</div>';
                       

                        include '../partials/user_resume/_previousJobsModal.php';

                        echo ' <hr>
            <br>';

                    }?>


            



                        
                    
                    
                
                    
                    </div>

       

            












                    <!-- internship details -->


                    <div class="row mt-3 mb-3">
                    
                    
                    <?php

echo '<div class="col-md-5">internships</div>';

                                $sql = "SELECT * FROM `internship_experience_details` WHERE user_email='$user_email'";
                                $result = mysqli_query($conn, $sql);
                                $title1 = "";
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    
                                    if(isset($row['title1']))
                                    {
                                        $title1 = $row['title1'];
                                        $company_name1 = $row['company_name1'];
                                    }
                                
                                    if(isset($row['title2']))
                                    {
                                        $title2 = $row['title2'];
                                        $company_name2 = $row['company_name2'];
                                    }
                                    if(isset($row['title3']))
                                    {
                                        $title3 = $row['title3'];
                                        $company_name3 = $row['company_name3'];
                                        $full = 0;
                                    }
                                


                                echo '
                                <div class="col-md-5"><p class="pb-2">'. $title1 .'  '. $company_name1 .'</p>
                                <p class="pb-2">'. $title2 .'  '. $company_name2 .'</p>
                                <p class="pb-2">'. $title3 .'  '. $company_name3 .'</p>';


                               
                                    echo '</div>';
                                if($title1 == "")
                                {
                                    $showOptions = 0;
                                }
                                else 
                                {
                                    $showOptions = 1;
                                }

                         
                                
                                include '../partials/user_resume/_previousInternshipsModal.php';

                                echo ' <hr>
                                <br>';
                                    

                    }?>

                 
                    
                
                
                    </div>

  

              












                    <!-- position of responsibility details -->


                    <div class="row mt-3 mb-3">
                    
                    <?php

                                            echo '<div class="col-md-5">position of responsibilty</div>';

                                $sql = "SELECT * FROM `pr_experience_details` WHERE user_email='$user_email'";
                                $result = mysqli_query($conn, $sql);

                                $title1 = "";

                                while($row = mysqli_fetch_assoc($result))
                                {
                                    
                                    if(isset($row['title1']))
                                    {
                                        $title1 = $row['title1'];
                                        $company_name1 = $row['company_name1'];
                                    }
                                
                                    if(isset($row['title2']))
                                    {
                                        $title2 = $row['title2'];
                                        $company_name2 = $row['company_name2'];
                                    }
                                    if(isset($row['title3']))
                                    {
                                        $title3 = $row['title3'];
                                        $company_name3 = $row['company_name3'];
                                        $full = 0;
                                    }
                                


                                echo '
                                <div class="col-md-5"><p class="pb-2">'. $title1 .'  '. $company_name1 .'</p>
                                <p class="pb-2">'. $title2 .'  '. $company_name2 .'</p>
                                <p class="pb-2"> '. $title3 .'  '. $company_name3 .'</p>';


                                
                                    echo '</div>';
                                
                                

                                include '../partials/user_resume/_prExperienceModal.php';


                                echo ' <hr>
                                <br>';
                                    

                    }?>


                    
                   
                
                
                    </div>

  


                    










                    <!-- trainings/ courses details -->

                    <div class="row mt-3 mb-3">
                    
                    
                    

                     <?php

                                echo '<div class="col-md-5">Trainings/Courses completed</div>';

                                $sql = "SELECT * FROM `trainings_details` WHERE user_email='$user_email'";
                                $result = mysqli_query($conn, $sql);

                                $title1 = "";
                                $title2 = "";
                                $title3 = "";
                                $title4 = "";

                                $company_name1 = "";
                                $company_name2 = "";
                                $company_name3 = "";
                                $company_name4 = "";


                                while($row = mysqli_fetch_assoc($result))
                                {
                                    
                                    if(isset($row['training_title1']))
                                    {
                                        $title1 = $row['training_title1'];
                                        $company_name1 = $row['training_organization1'];
                                    }
                                
                                    if(isset($row['title2']))
                                    {
                                        $title2 = $row['training_title2'];
                                        $company_name2 = $row['training_organization2'];
                                    }
                                    if(isset($row['title3']))
                                    {
                                        $title3 = $row['training_title3'];
                                        $company_name3 = $row['training_organization3'];
                                        
                                    }

                                    if(isset($row['title4']))
                                    {
                                        $title4 = $row['training_title4'];
                                        $company_name4 = $row['training_organization4'];
                                        
                                    }
                                


                                echo '
                                <div class="col-md-5"><p class="pb-2">'. $title1 .'</p> <p class="mx-3"> '. $company_name1 .'</p>
                                <p class="pb-2">'. $title2 .' </p><p class="mx-3">'. $company_name2 .'</p>
                                <p class="pb-2"> '. $title3 .' </p><p class="mx-3>" '. $company_name3 .'</p>
                                <p class="pb-2"> '. $title4 .' </p><p class="mx-3"> '  . $company_name4 . '</p>';
                                


                                
                                    echo '</div>';
                                
                               

                                include '../partials/user_resume/_prExperienceModal.php';


                                echo ' <hr>
                                <br>';
                                    

                    }?>



                
                    </div>

      






                    <div class="row mt-3 mb-3">
                    
                    
                    <div class="col-md-5">Projects/ Research works</div>
                    
                 
                
                
                    </div>
                    <hr>
                    <br>



                    <div class="row mt-3 mb-3">
                    <div class="col-md-5">Skills</div>
                    <?php

                    $sql = "SELECT * FROM `skills_details` WHERE user_email='$user_email'";
                    $result = mysqli_query($conn, $sql);
                    echo '<div class="col-md-5">';
                    while($row = mysqli_fetch_assoc($result))
                    {
                       echo  ''.$row['skill1'] .' <p></p> '. $row['skill2'];
                       echo '<p></p>';
                       echo  $row['skill3'] .' <p></p> '. $row['skill4'];
                       echo '<p></p>';
                       echo  $row['skill5'] .' <p></p> '. $row['skill6'];
                       echo '<p></p>';
                       echo  $row['skill7'] .' <p></p> '. $row['skill8'];
                       echo '<p></p>';
                       echo  $row['skill9'] .' <p></p> '. $row['skill10'];

                     
                       
                    } ?>

                    
                    </div>
                    
                
                
                    </div>
                    <hr>
                    <br>


                    <div class="row mt-3 mb-3">
                    <div class="col-md-5">Work Profiles</div>
                    <?php

                    $sql = "SELECT * FROM `worklink_details` WHERE user_email='$user_email'";
                    $result = mysqli_query($conn, $sql);
                    echo '<div class="col-md-5">';
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $github = $row['github'];
                        $portfolio = $row['portfolio'];
                        $blogsite = $row['blogsite'];
                        $playstorelink = $row['playstorelink'];
                    
                        echo ' <p><a href = '.$github.' style="text-decoration:none;">Github</a></p>';
                        echo ' <p><a href = '.$portfolio.' style="text-decoration:none;">Portfolio</a></p>';
                        echo ' <p><a href = '.$blogsite.' style="text-decoration:none;">Blogsite</a></p>';
                        echo ' <p><a href = '.$playstorelink.' style="text-decoration:none;">Playstore Profile</a></p>';


                       
                    } ?>

                    </div>
                   
                   
                  
                
                
                    </div>
                   

             
                    


</div>
<div class="col-md-2"></div>

                   



     </div>
</div>


</div>


<div class="text-center mb-5"><a role="button" href="#" class="btn btn-primary">Shortlist</a></div> 

<?php   
include '../partials/_deleteModal.php';
?>




<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>




