<?php

include '_navbar.php';


?>


<!-- displays the data from search input  -->


<!doctype html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <!-- style links -->
    <link rel="stylesheet" href="css/joblist.css">


    <!-- font awesome for icons  -->

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>List of Jobs/Internships</title>

   
  </head>
  <body>
    
   <!-- sql to retrieve data from job_details, basic_employer_details -->
   <div class="container">
                
                <div class="max-width-container">
   <?php
include '_db-connection.php';

    if(!isset($_GET['search']))
    {

        echo '<h3 class="text-center mt-5">No related internships/Jobs found</h3> ';
        exit();
    }

    $job_category = $_GET['search'];



    //using prepared stmt

    $sql = "SELECT * FROM job_details WHERE job_category = ?";


    if($stmt = mysqli_prepare($conn, $sql))
    {
        mysqli_stmt_bind_param($stmt,"s", $job_category);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $numsRows = mysqli_num_rows($result);
    

        

    }
    else
    {
        echo '<h3 class="text-center mt-5">No related internships/Jobs found</h3> ';
    }


    if($numsRows == 0)
    {
        echo '<h3 class="text-center mt-5">No related internships/Jobs found</h3> ';

    }



    
 

   while($row = mysqli_fetch_assoc($result))
  {

    

      $company  = $row['company_name'];
      $title = $row['job_title'];
      $workfromhome = $row['work_from_home'];
      $start = $row['start_date'];
      $duration = $row['duration'];
      $paid = $row['stipend'];
      $stipend = "unpaid";
      $stipend = $row['stipend'];
      $job_id = $row['job_id'];

      echo '
      
                
                    
                        <div class="row mt-5">
                        
                            <div class="col-lg-6 offset-lg-2" >
                            
                            
                                <div class="card">
                                    <div class="card-header">
                                        '. $company .'
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">'. $title .'</h5>

                                        <i class="fas fa-map-marker-alt"></i> ';

                                        if($workfromhome == 1)
                                        {
                                            $location = "Work From Home";
                                        }
                                        else
                                        {
                                            $location = $row['location'];
                                        }
                                        
                    echo '                  '. $location .'
                                            <div class="row mt-4">
                                            
                                                <div class="col-md-4"><i class="fas fa-play-circle">&nbsp</i>start date '. $start .'</div>
                                                <div class="col-md-4"><i class="fas fa-calendar-alt">&nbsp</i>duration '. $duration .'</div>
                                                <div class="col-md-4"><i class="fas fa-credit-card">&nbsp</i>stipend'. $stipend .'</div>

                                            </div>
                                    
                                        <div class="container mt-3">
                                        <a href="posted_jobs_pages/view_details.php?job_id='. $job_id.'&apply=true" class="btn btn-sm btn-primary" style="float: right;">view details</a>

                                        </div>
                                        
                                    </div>
                                </div>

                            
                            </div>

                            <div class="col-md-4">
                            </div>
                        
                        </div>

            
      
      
      ';




      



  }




   ?>

  

   
</div>
                
                </div>


  

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  
  </body>
</html>


