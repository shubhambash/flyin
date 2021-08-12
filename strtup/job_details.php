
<?php

include 'partials/_db-connection.php';


?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <!-- css styling -->
    <link rel="stylesheet" href="css/job_details.css">
    <title>Details</title>

    <style>



    </style>
  </head>
  <body>
    

    <?php

        include 'partials/_navbar.php';

    ?>



    <div class="container-fluid mt-5">
    
        <!-- php starts here -->

        <?php

        
        $id = $_GET['job_id'];
        $sql = "SELECT * FROM `jobs` WHERE job_id=$id";

        $result = mysqli_query($conn, $sql);
        

        while($row = mysqli_fetch_assoc($result))
        {
            $job_title = $row['job_title'];
            $job_location = $row['job_location'];
            $job_company = $row['job_company'];
            $job_company_about = $row['job_company_about'];
            $job_type = $row['job_type'];
            $eligibility = explode('.',$row['job_eligibility']);
            $responsibilities = explode('.',$row['job_description']);
            $job_stipend = $row['job_stipend'];
            $job_startdate = $row['job_startdate'];
            $job_duration = $row['job_duration'];
            $job_deadline = $row['job_deadline'];
            $job_skills = explode(".",$row['job_skills']);
            $job_openings = $row['job_openings'];
               


                echo '<div class="max-width-container">
                
                <h2 class="text-center mb-3">'. $job_title .'/ '. $job_location .' at '. $job_company .'</h2>

                <div class="details_view">
               
    
                    <!-- About the company  -->

                    <div class="aboutcompany pt-3 pb-3">
                            <h4>'. $job_company .'</h4>
    
                            <p>Visit the <a href="#">Website</a></p>
                            <p> '. $job_company_about.' </p>
    
                    </div>
    
                
    
                    <!-- About the job in brief -->
                    <hr>
                    <div class="aboutjob pt-3 pb-3">
    
    
                    <h4>About the '. $job_type .' </h4>
    
                    <p class="fw-bold">Type:  '. $job_type .'</p>
                    <p class="fw-bold">Eligibility: </p>';

                   
                    $count = 0;
                    foreach($eligibility as $line)
                    {
                        $count++;
                        echo  '<p>'. $count.') '. trim($line) .'.</p>';
                    }
                    
                    
    
                    echo '
                    <p class="fw-bold">Responsibilities</p>';
                    
                    $count = 0;
                    foreach($responsibilities as $line)
                    {
                        $count++;
                        if(trim($line) == "")
                        {
                            break;
                        }
                        echo  '<p>'. $count.') '. trim($line) .'.</p>';
                    }

                    


                    
                    echo '
    
                            <div class="conatiner pt-4 pb-4">
                            
                            
                                <div class="row">
                                    
                                    <div class="col-md-3">Stipend : '. $job_stipend .'/Month</div>
                                    <div class="col-md-3">Start Date: '. $job_startdate .'</div>
                                    <div class="col-md-3">Duration: '. $job_duration .' Days</div>
                                    <div class="col-md-3">Deadline: '. $job_deadline .'</div>
                                
                                </div>
                            
                            
                            </div>
                            <h4>Skills required</h4><p class="px-3">';


                            foreach($job_skills as $skill)
                            {
                                echo '<span class="badge rounded-pill bg-light text-dark px-3">'. $skill .'</span>';
                            }
                    
                   
    
                    
    
                       
                        
                        
                        
                                 echo ' </p> 
                            
    
                    </div>

                    <p class="fw-bold"> Openings : '. $job_openings .'
    
    

                    
               
    
    
    
                    
    
                        <div class="row">';



                        if(isset($_SESSION['useremail']))
                        {
                            $user_email = $_SESSION['useremail'];
                        
                        

                        $ResumeReadySql = "SELECT filled_resume FROM users WHERE user_email='$user_email'";
                        $ResumeReadySqlResult = mysqli_query($conn, $ResumeReadySql);

                        if($ResumeReadySqlResult)
                        {
                            $row = mysqli_fetch_assoc($ResumeReadySqlResult);
                            $filledResume = $row['filled_resume'];
                            
                            
                        }
                
                    }
                        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $filledResume == 1)
                        {
                            
                            echo '<div class="col-md-4"></div>
                            <div class="col-md-4 applyButton "><a href="job_apply.php?job_id='. $id .'" class="btn btn-success">Apply Now</a></div>
                            <div class="col-md-4"></div>
                        
                        </div>';
                        }
                        else if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $filledResume == 0)
                        {
                            echo '<div class="col-md-4"></div>
                            <div class="col-md-4 applyButton "><a href="user_resume_pages/user_resume_page1.php?NewUser=true" class="btn btn-success">Apply Now</a></div>
                            <div class="col-md-4"></div>
                        
                        </div>';
                        }

                        else 
                        {
                            echo '<div class="col-md-4"></div>
                            <div class="col-md-4 applyButton "><a href="login_signup_page.php?login=true" class="btn btn-success">Apply Now</a></div>
                            <div class="col-md-4"></div>
                        
                        </div>';
                        }


       
                        
                        
                         
                        
                        
    
                
    
    
    
    
                echo '
                   
                </div>
            
            
            </div>';
            


        }

        ?>
      
        
        


       
    
    
    
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


  </body>
</html>