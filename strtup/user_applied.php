<?php

include 'partials/_navbar.php';
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


    <!-- css styling  -->
    <link rel="stylesheet" href="css/job_apply.css">
    <title>your applications</title>
  </head>
  <body>

  <div class="container">
        
        <div class="max-width-container">
        
            <div class="row">
            
                
                <h3 class="text-center mt-5 mb-4">Applications</h3>

        <?php

        if(!isset($_SESSION['loggedin']))
        {
            echo '<h1 class="text-center">please <a href="login_signup_page.php?login=true">login</a> first</h1>';
            exit();
        }

        $user_email = $_SESSION['useremail'];

        $sql = "SELECT job_id, datetime FROM applicants WHERE user_email='$user_email'";
        $result = mysqli_query($conn, $sql);

        if(!$result)
        {
            echo 'Not applied for any jobs or internships yet';
            exit();
        }

        $count = 1;
        while($row = mysqli_fetch_assoc($result))
        {
            $job_id = $row['job_id'];

            $sql1 = "SELECT * FROM job_details WHERE job_id ='$job_id'";
            $result1 = mysqli_query($conn, $sql1);
           
            $row1 = mysqli_fetch_assoc($result1);
           
            $name = $row1['company_name'];
            $title= $row1['job_title'];
            $type = $row1['job_type'];
            $applied = $row['datetime'];
            $tostring = strtotime($applied);
            $toshow = date("m/d/y", $tostring);

            echo '
            
            <div class="mt-3 mb-3 pt-3 pb-3" style="background-color: lightgreen">
            
                <div class="row">
                
                <div class="col-md-2"><strong>'. $count++  .') '. ucfirst($name) .'</strong></div>
                <div class="col-md-3"><strong>Profile: '. ucfirst($title) .'</strong></div>
                <div class="col-md-2"><strong>Type: '. ucfirst($type) .'</strong></div>
                <div class="col-md-2"><strong>Applied on: '. $toshow .'</strong></div>
                <div class="col-md-2"><a role="button" href="posted_jobs_pages/view_details.php?job_id='.$job_id.'" class="btn btn-secondary btn-sm">details</a></div>
                
                </div>


            </div>
            
            ';

            echo '<br><br>';


 
        }

        

        ?>



                    
                   

               
                
                </div>
            
            </div>
        
        </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

 
  </body>
</html>