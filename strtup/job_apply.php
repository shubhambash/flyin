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
    <title>Hello, world!</title>
  </head>
  <body>
<?php



        if($_SERVER['REQUEST_METHOD'] != "POST")
        {
            echo '<h1 class="text-center mt-5">404</h1> <p class="text-center">Page Not Found</p>';
            exit();
        }





        if(!isset($_SESSION['loggedin']))
        {
            echo '<h2 class="text-center mt-5">Please <a href="login_signup_page.php?login=true>Login</a> First"</h2> ';
            exit();
        }

       


        $user_email = $_SESSION['useremail'];

        $sql = "SELECT * FROM users WHERE user_email='$user_email'";
        $result = mysqli_query($conn, $sql);

        if(!$result)
        {
            echo 'something went wrong';
            exit();
        }

      




        //if filled_resume == 0 then redirect the user to the user_resume_pages else insert the data into applicants table

            $row = mysqli_fetch_assoc($result);
            if($row['filled_resume'] == 0)
            {
                echo '<h3 class="text-center mt-5"> Please Complete Your <a href="user_resume_pages/user_resume_page1.php"> Resume </a> First</h3>';
                exit();
            }




        //resume is filled , so retrieve basic user info from user_resume_basic info
        $job_id = $_GET['job_id'];


        $sql = "SELECT * FROM applicants WHERE user_email='$user_email' AND job_id='$job_id'";
        $result = mysqli_query($conn, $sql);

        $numrows = mysqli_num_rows($result);
        if($numrows > 0)
        {
            echo '<h1 class="text-center mt-5">Already Applied For this Internship/Job</h1>
            <p class="text-center mt-4"> You have already applied for this internship/job before</p>

            <div class="container">

            <div class="row mt-5">

                <div class="col-md-6 text-center mt-5">

                
                    <a  role="button" class="btn btn-primary" href="user_resume_pages/user_resume_final.php">Edit Resume</a>

                
                </div>   


                <div class="col-md-6 text-center mt-5">

                
                    <a  role="button" class="btn btn-primary" href="user_applied.php">Applied so far</a>

                
                </div>      
                    
            </div>

        </div>
            ';
            exit();
        }


        

        
        $sql = "INSERT INTO `applicants` (`user_email`, `user_first_name`, `user_last_name`,`job_id`)  
        SELECT user_email,user_first_name, user_last_name,$job_id
          FROM `user_resume_basic_details`
         WHERE `user_email` = '$user_email'";

        $result2 = mysqli_query($conn, $sql);

        

        
        

     


  

        if($result2)
        {

      
      

            

         
                

                    echo '<h3 class="text-center mt-5">Applied Successfully</h3>
                   <p class="text-center mt-4"> <strong > You will receive further notifications when the employer accepts your application</strong></p>
                   
                    <div class="container">

                        <div class="row mt-5">

                            <div class="col-md-6 text-center mt-5">

                            
                                <a  role="button" class="btn btn-primary" href="user_resume_pages/user_resume_final.php">Edit Resume</a>

                            
                            </div>   


                            <div class="col-md-6 text-center mt-5">

                            
                                <a  role="button" class="btn btn-primary" href="#">Applied so far</a>

                            
                            </div>      
                                
                        </div>

                    </div>

                   
                   ';


                exit();
            
        }?>


  










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

 
  </body>
</html>