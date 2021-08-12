<!-- Resume Page / Final/ for the employee/user-->






<?php
include '../partials/_navbar.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
{
 Header("Location:../login_signup_page.php?login=true");
 exit();
}

include '../partials/_db-connection.php';
$user_email = $_SESSION['useremail'];


//if resume ahs not been filled the go to resume page 1
$sql = "SELECT filled_resume FROM users WHERE user_email = '$user_email'";
$result = mysqli_query($conn, $sql);

if($result)
{
    $row = mysqli_fetch_assoc($result);
    if($row['filled_resume'] == 0)
    {
        Header("Location:user_resume_page1.php?");
        exit();
    }

}
else
{
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





    <title>Resume</title>



  </head>
  <body>

  <div class="container">

<div class="max-width-container">


<div class="row">



<div class="col-md-2"></div>


<div class="col-md-8">



                   
                    <div class="education px-4 my-5">
                    <br><br>
                    <h2 class="text-center">Resume</h2>

<?php 


                
              
                $user_email = $_SESSION['useremail'];
                $sql = "SELECT * FROM `user_resume_basic_details` WHERE user_email='$user_email'";
                $result = mysqli_query($conn, $sql);


                while($row = mysqli_fetch_assoc($result))
                {
                    $firstname = $row['user_first_name'];
                    $lastname = $row['user_last_name'];
                    $contact = $row['user_contact'];
                    $address = $row['current_address_one'];
                    $address_two = $row['current_address_two'];
                

                echo'<h4 style="color: #696969;">'. ucfirst($firstname) .' '. ucfirst($lastname) .'</h4>';
                echo '  <div class="row mt-3">
                    
                <div class="col-md-3">+977-'. $contact .'</div>
                <div class="col-md-4"><b><span style="color:#696969;font-size: 17px;">Email</span></b>: '. $user_email .'</div>
                <div class="col-md-5"><b><span style="color:#696969;font-size: 17px;">Address</span></b> : '. ucfirst($address) .'&nbsp&nbsp|&nbsp&nbsp '. ucfirst($address_two) .'</div>
            
            </div>';
                           

                } ?>
                    
                  


                    <hr>
                    <br>








                <!-- graduation details -->
                    <div class="row mt-3 mb-3">
                    <div class="col-md-5"><b><span style="color:#696969;font-size: 17px;">Education</span></b></div>
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
                        
                        <p class="fw-bold" >'. $degree .', '. $stream .'</p>
                        <p style="font-size: 16px;color:#696969;">'. $collegeName .'</p>
                        <p style="font-size: 16px;color:#696969;"> '. $start .' - '. $end .'</p>
                        <p style="font-size: 16px;color:#696969;">'. $degree .'</p>
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
                    if($showOptions == 1)
                    {

                        include '../partials/user_resume/_editgraduationModal.php';
                        
                        echo '
                        
                        <div class="col-md-2"><a class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#editgraduation"><i  class="fas fa-pen px-3"></i></a> <a data-bs-toggle="modal" data-bs-target="#deleteGraduation" class="align-items-center"><i class="fas fa-trash-alt"></i></a></div>';
                    }

                    
                    ?>
                   

                    
                    </div>


                            <!-- Modal -->
                            <div class="modal fade" id="deleteGraduation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">are you sure you want to delete this record?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="../partials/user_resume/delete_records/delete_record.php?tableName=graduation_details" method="post">
                                    <div class="row">
                                        
                                        <div class="col-md-6 text-center"><button type="submit" class="btn btn-danger">Yes</button></div>
                                        <div class="col-md-6 text-center"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button></div>
                                        
                                    </div>
                                    </form>
                                </div>
                            
                                </div>
                            </div>
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
                                

                                

                               

                            

                                echo '<br><p class="fw-bold">Grade XII or equivalent</p>
                                <p style="font-size: 16px;color:#696969;">'. $schoolName .'</p>
                                <p> style="font-size: 16px;color:#696969;"'. $board .', ' . $stream . '</p>';

                                
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
                            if($showOptions == 1)
                            {
                                echo '                         




                                <div class="col-md-2"><a data-bs-toggle="modal" data-bs-target="#editseniorSecondary" class="align-items-center"> <i class="fas fa-pen px-3"></i></a> <a  data-bs-toggle="modal" data-bs-target="#deleteSeniorSecondary" class="align-items-center"><i class="fas fa-trash-alt" ></i></a></div>';
                            }

                            include '../partials/user_resume/_editseniorSecondaryModal.php';

                            

                            ?>

                            





                            <!-- modal to delete record of senior secondary -->

                            <!-- Modal -->
                            <div class="modal fade" id="deleteSeniorSecondary" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">are you sure you want to delete this record?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="../partials/user_resume/delete_records/delete_record.php?tableName=senior_secondary_details" method="post">
                                    <div class="row">
                                        
                                        <div class="col-md-6 text-center"><button type="submit" class="btn btn-danger">Yes</button></div>
                                        <div class="col-md-6 text-center"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button></div>
                                        
                                    </div>
                                    </form>
                                </div>
                            
                                </div>
                            </div>
                            </div>
                                                        
  

                    
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
                        

                        

                       

                    

                        echo '<br><p class="fw-bold">Grade X(SEE or equivalent)</p>
                        <p style="font-size: 16px;color:#696969;">'. $schoolName .'</p>
                        <p style="font-size: 16px;color:#696969;">'. $board .'</p>';

                        
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
                    

                    if($showOptions == 1)
                    {
                        echo '                            </div>




                        <div class="col-md-2"><a data-bs-toggle="modal" data-bs-target="#editsecondary" class="align-items-center"> <i class="fas fa-pen px-3"></i></a> <a  data-bs-toggle="modal" data-bs-target="#deleteSecondary" class="align-items-center"><i class="fas fa-trash-alt" ></i></a></div>';
                    }

                    include '../partials/user_resume/_editsecondaryModal.php';

                    

                    ?>

                    

                    </div>



                    <!-- modal to delete record of secondary -->

                    <!-- Modal -->
                    <div class="modal fade" id="deleteSecondary" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">are you sure you want to delete this record?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="../partials/user_resume/delete_records/delete_record.php?tableName=secondary_details" method="post">
                            <div class="row">
                                
                                <div class="col-md-6 text-center"><button type="submit" class="btn btn-danger">Yes</button></div>
                                <div class="col-md-6 text-center"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button></div>
                                
                            </div>
                            </form>
                        </div>
                    
                        </div>
                    </div>
                    </div>



                    <!-- add education -->
                    <div class="row">

                                <div class="col-md-5"></div>

                                <div class="col-md-5">
                                <a href="user_resume_page3.php?returnButton=true" style="text-decoration:none;">+ Add education</a>
                                </div>

                                <div class="col-md-2"></div>



                    </div>





                    <hr>
                    <br>





























                    <!-- jobs details -->


                    <div class="row mt-3 mb-3">
                    <div class="col-md-5"><b><span style="color:#696969;font-size: 17px;">Jobs</span></b></div>
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
                       <div class="col-md-5"><p class="pb-2 fw-bold">'. ucwords($title1) .' <span style="font-size: 16px;color:#696969;"> '. ucfirst($company_name1) .'</span></p>
                       <p class="pb-2 fw-bold">'. ucwords($title2) .' <span style="font-size: 16px;color:#696969;"> '. ucfirst($company_name2) .'</span></p>
                       <p class="pb-2 fw-bold">'. ucwords($title3) .' <span style="font-size: 16px;color:#696969;"> '. ucfirst($company_name3) .'</span></p>';


                      
                          
                       
                       echo '</div>
                       <div class="col-md-2"><a data-bs-toggle="modal" data-bs-target="#jobExperience" class="align-items-center"> <i class="fas fa-pen px-3"></i></a>  <a data-bs-toggle="modal" data-bs-target="#deleteJob" class="align-items-center"><i class="fas fa-trash-alt"></i></a></div>';

                        include '../partials/user_resume/_previousJobsModal.php';

                        

                    }?>


                    <!-- modal to delete job experience record -->

                    <!-- Modal -->
                    <div class="modal fade" id="deleteJob" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">are you sure you want to delete this record?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="../partials/user_resume/delete_records/delete_record.php?tableName=job_experience_details" method="post">
                            <div class="row">
                                
                                <div class="col-md-6 text-center"><button type="submit" class="btn btn-danger">Yes</button></div>
                                <div class="col-md-6 text-center"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button></div>
                                
                            </div>
                            </form>
                        </div>
                    
                        </div>
                    </div>
                    </div>



                        
                    
                    
                
                    
                    </div>

                    <div class="row">
                    
                        <div class="col-md-5"></div>
                        <div class="col-md-5"><a href="user_resume_page4.php" style="text-decoration:none;">+ Add experience</a></div>
                        <div class="col-md-2"></div>

                    </div>

                    <hr>
                    <br>













                    <!-- internship details -->


                    <div class="row mt-3 mb-3">
                    <div class="col-md-5"><b><span style="color:#696969;font-size: 17px;">Internships</span></b></div>
                    
                    <?php

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
                                <div class="col-md-5"><p class="pb-2 fw-bold">'. $title1 .' <span style="font-size: 16px;color:#696969;"> '. $company_name1 .'</span></p>
                                <p class="pb-2 fw-bold">'. $title2 .' <span style="font-size: 16px;color:#696969;"> '. $company_name2 .'</span></p>
                                <p class="pb-2 fw-bold">'. $title3 .' <span style="font-size: 16px;color:#696969;"> '. $company_name3 .'</span></p>';


                               
                                    echo '</div>';
                                if($title1 == "")
                                {
                                    $showOptions = 0;
                                }
                                else 
                                {
                                    $showOptions = 1;
                                }

                                if($showOptions == 1)
                                {

                                    echo '
                                <div class="col-md-2"><a data-bs-toggle="modal" data-bs-target="#internshipExperience" class="align-items-center"><i class="fas fa-pen px-3"></i></a>   <a data-bs-toggle="modal" data-bs-target="#deleteInternship" class="align-items-center"><i class="fas fa-trash-alt"></i></a></div>';

                                }
                                
                                include '../partials/user_resume/_previousInternshipsModal.php';


                                    

                    }?>


                    <!-- modal to delete internships record -->

                    
                    <!-- Modal -->
                    <div class="modal fade" id="deleteInternship" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">are you sure you want to delete this record?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="../partials/user_resume/delete_records/delete_record.php?tableName=internship_experience_details" method="post">
                            <div class="row">
                                
                                <div class="col-md-6 text-center"><button type="submit" class="btn btn-danger">Yes</button></div>
                                <div class="col-md-6 text-center"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button></div>
                                
                            </div>
                            </form>
                        </div>
                    
                        </div>
                    </div>
                    </div>                    
                    
                
                
                    </div>

                    <div class="row mb-2">

                        <div class="col-md-5"></div>
                        <div class="col-md-5"><a href="user_resume_page4.php" style="text-decoration:none;">+ Add experience</a></div>
                        <div class="col-md-2"></div>

                    </div>


                    <hr>
                    <br>












                    <!-- position of responsibility details -->


                    <div class="row mt-3 mb-3">
                    <div class="col-md-5"><b><span style="color:#696969;font-size: 17px;">Position of Responsibility</span></b></div>
                    <?php

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
                                <div class="col-md-5"><p class="pb-2 fw-bold">'. $title1 .' <span style="font-size: 16px;color:#696969;"> '. $company_name1 .'</span></p>
                                <p class="pb-2 fw-bold">'. $title2 .' <span style="font-size: 16px;color:#696969;"> '. $company_name2 .'</span></p>
                                <p class="pb-2 fw-bold"> '. $title3 .' <span style="font-size: 16px;color:#696969;"> '. $company_name3 .'</span></p>';


                                
                                    echo '</div>';
                                
                                echo '
                                <div class="col-md-2"><a data-bs-toggle="modal" data-bs-target="#prExperience" class="align-items-center"><i class="fas fa-pen px-3"></i></a>    <a data-bs-toggle="modal" data-bs-target="#deletePr" class="align-items-center"><i class="fas fa-trash-alt"></i></a></div>';

                                include '../partials/user_resume/_prExperienceModal.php';


                           
                                    

                    }?>


                    
                   
                
                
                    </div>

                    <!-- modal to delete pr experience -->


                    <!-- add pr experiences here -->

                    <div class="modal fade" id="deletePr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">are you sure you want to delete this record?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="../partials/user_resume/delete_records/delete_record.php?tableName=pr_experience_details" method="post">
                            <div class="row">
                                
                                <div class="col-md-6 text-center"><button type="submit" class="btn btn-danger">Yes</button></div>
                                <div class="col-md-6 text-center"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button></div>
                                
                            </div>
                            </form>
                        </div>
                    
                        </div>
                    </div>
                    </div>  



                    <div class="row">

                        <div class="col-md-5"></div>
                        <div class="col-md-5"><a href="user_resume_page4.php" style="text-decoration:none;">+ position of responsibility</a></div>
                        <div class="col-md-2"></div>

                    </div>

                    


                    <hr>
                    <br>





















                    <!-- trainings/ courses details -->

                    <div class="row mt-3 mb-3">
                    
                    
                    <div class="col-md-5"><b><span style="color:#696969;font-size: 17px;">Trainings/ Courses</span></b></div>

                     <?php

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
                                <div class="col-md-5"><p class="pb-2 fw-bold">'. $title1 .'</p> <p class="mx-3"> <span style="font-size: 16px;color:#696969;">'. $company_name1 .'</span></p>
                                <p class="pb-2 fw-bold">'. $title2 .' </p><p class="mx-3"><span style="font-size: 16px;color:#696969;">'. $company_name2 .'</span></p>
                                <p class="pb-2 fw-bold"> '. $title3 .' </p><p class="mx-3>" <span style="font-size: 16px;color:#696969;">'. $company_name3 .'</span></p>
                                <p class="pb-2 fw-bold"> '. $title4 .' </p><p class="mx-3"> <span style="font-size: 16px;color:#696969;">'  . $company_name4 . '</span></p>';
                                


                                
                                    echo '</div>';
                                
                                echo '
                                <div class="col-md-2"><a data-bs-toggle="modal" data-bs-target="#prExperience" class="align-items-center"><i class="fas fa-pen px-3"></i></a>    <a data-bs-toggle="modal" data-bs-target="#deleteTraining" class="align-items-center"><i class="fas fa-trash-alt"></i></a></div>';

                                // 


                           
                                    

                    }?>


                     <!-- modal to delete record of training/courses -->

                    <!-- Modal -->
                    <div class="modal fade" id="deleteTraining" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">are you sure you want to delete this record?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="../partials/user_resume/delete_records/delete_record.php?tableName=trainings_details" method="post">
                            <div class="row">
                                
                                <div class="col-md-6 text-center"><button type="submit" class="btn btn-danger">Yes</button></div>
                                <div class="col-md-6 text-center"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button></div>
                                
                            </div>
                            </form>
                        </div>
                    
                        </div>
                    </div>
                    </div>


                
                    </div>

                    
                    <div class="row">

                        <div class="col-md-5"></div>
                        <div class="col-md-5"><a href="user_resume_page4.php" style="text-decoration:none;">+ Add Trainings/ Courses</a></div>
                        <div class="col-md-2"></div>

                    </div>

                    <hr>
                    <br>




















                    <div class="row mt-3 mb-3">
                    
                    
                    <div class="col-md-5"><b><span style="color:#696969;font-size: 17px;">Projects/ Research</span></b></div>
                    <div class="col-md-5">+ Add projects</div>
                   <div class="col-md-2"><i class="fas fa-pen px-3"></i><i class="fas fa-trash-alt"></i></div>
                
                
                    </div>
                    <hr>
                    <br>



                    <div class="row mt-3 mb-3">
                    <div class="col-md-5"><b><span style="color:#696969;font-size: 17px;">Skills</span></b></div>
                    <?php

                    $sql = "SELECT * FROM `skills_details` WHERE user_email='$user_email'";
                    $result = mysqli_query($conn, $sql);
                    echo '<div class="col-md-5">';
                    while($row = mysqli_fetch_assoc($result))
                    {

                        echo 
                        '
                        
                        <div class="mb-4">
                        <span class="badge rounded-pill bg-secondary">'. $row['skill1'] .'</span>
                        <span class="badge rounded-pill bg-secondary">'. $row['skill2'] .'</span>
                        <span class="badge rounded-pill bg-secondary">'. $row['skill3'] .'</span>
                        <span class="badge rounded-pill bg-secondary">'. $row['skill4'] .'</span>
                        <span class="badge rounded-pill bg-secondary">'. $row['skill5'] .'</span>
                        <span class="badge rounded-pill bg-secondary">'. $row['skill6'] .'</span>
                        <span class="badge rounded-pill bg-secondary">'. $row['skill7'] .'</span>
                        <span class="badge rounded-pill bg-secondary">'. $row['skill8'] .'</span>
                        <span class="badge rounded-pill bg-secondary">'. $row['skill9'] .'</span>
                        <span class="badge rounded-pill bg-secondary">'. $row['skill10'] .'</span>
                        </div>
                        
                        ';


                       echo '<a href="user_resume_page5.php" style="text-decoration:none;">+ Add Skills</a>';
                       
                    } 

                    echo '
                    </div>
                    <div class="col-md-2">';
                    
                    
                    
                   

                   
                    
                    
                    
                    
                    ?>
                    </div>
                    </div>
                    <hr>
                    <br>


                    <div class="row mt-3 mb-3">
                    <div class="col-md-5"><b><span style="color:#696969;font-size: 17px;">Profiles</span></b>&nbsp&nbsp<i class="fas fa-link"></i></div>
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
                    
                        echo ' <p  class="fw-bold" ><a href = "'.$github.'" style="text-decoration:none;color: darkgreen;">Github</a></p>';
                        echo ' <p class="fw-bold"><a href = "'.$portfolio.'" style="text-decoration:none;color: darkgreen;">Portfolio</a></p>';
                        echo ' <p class="fw-bold">  <a href = "'. $blogsite .'" style="text-decoration:none;color: darkgreen;">Blogsite</a></p>';
                        echo ' <p class="fw-bold"><a href = "'.$playstorelink.'" style="text-decoration:none;color: darkgreen;">Playstore Profile</a></p>';

                        echo '<a href="user_resume_page6.php" style="text-decoration:none;">+ Add Profiles</a>';

                       
                    } ?>

                    </div>
                   
                   
                    
                
                
                    </div>
                   

             
                    


</div>
<div class="col-md-2"></div>

                   



     </div>
</div>


</div>


<div class="text-center mb-5"><a role="button" href="../index.php" class="btn btn-primary">Explore Jobs/Internships</a></div> 

<?php include '../partials/user_resume/_trainingDetailsModal.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>




