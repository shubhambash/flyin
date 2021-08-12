<!--  shows the details about the posted job -->

<!-- *********************This page is for employees *******************-->

<!-- there is a similar page for employers where they can edit the job details that they have posted -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">



    <!-- font awesome -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


        <!-- google fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Roboto:wght@300&family=Rubik:wght@300&display=swap" rel="stylesheet">
    <style>
      *{
font-family: 'Rubik', sans-serif;}


  body{


  
background-image : linear-gradient(rgba(255,255,255,0.99), rgba(255,255,255,0.99)), url(../images/doodle.png);
background-position: center;
background-size: 900px 900px;



}
 


    </style>


    <title>details</title>


    <style>

    .education{
    border-style: solid;
    border-width: thin;
    border-color: gainsboro; border-radius: 1%;
    margin-left: 10%;
    margin-right: 10%;

    
    }

    </style>
  </head>
  <body>
 


<!-- navbar  -->

 <?php 
 include '../partials/_navbar.php';
 include '../partials/_db-connection.php';

echo '<div class="max-width-container">';
 if(!isset($_SESSION['loggedin']))
 {
     
    echo '<h3 class="text-center mt-5">Please <a href="../login_signup_page.php?login=true">login</a> to continue</h3>';
    exit();
 }

 $user_email = $_SESSION['useremail'];


 //404 page
 if(!isset($_GET['job_id']))
 {
    echo '<h1 class="text-center pt-5">404!</h1>';
   echo '<img src="../images/404.png" alt="" style="height: 50%; width: 50%; opacity: 90%; display:block; margin: auto; margin-top: 20px;">'; 
    exit();
 }

 $job_id = $_GET['job_id'];

 

 $sql = "SELECT * FROM job_details WHERE job_id= ?";

 if($stmt = mysqli_prepare($conn, $sql))
 {
     mysqli_stmt_bind_param($stmt,"s",  $job_id);
     $rc = mysqli_stmt_execute($stmt);


     if($rc == false)
     {
         echo '<h1 class="text-center">No results found</h1>';
         exit();
     }

     $result = mysqli_stmt_get_result($stmt);
     
     if(mysqli_stmt_errno ($stmt) != 0)
     {
        echo '<h1 class="text-center mt-5">No results found</h1>';
        exit();
     }
     
    




    while($row = mysqli_fetch_assoc($result))
    {
       
        
        $name = $row['company_name'];
        $title = $row['job_title'];
        $type = $row['job_type'];
        $category = $row['job_category'];
        $workfromhome = $row['work_from_home'];
        $location = $row['location'];
        $startDate = $row['start_date'];
        $duration = $row['duration'];
        $paid = $row['paid'];
        $negotiable = $row['negotiable'];
        $stipend = $row['stipend'];
        $openings = $row['openings'];
        $description = $row['job_description'];

        $skill1  = $row['skill1'];           
        $skill2  = $row['skill2'];
        $skill3  = $row['skill3'];
        $skill4  = $row['skill4'];
        $skill5  = $row['skill5'];
        $skill6  = $row['skill6'];
        $skill7  = $row['skill7'];
        $skill8  = $row['skill8'];
        $skill9  = $row['skill9'];
        $skill10  = $row['skill10'];

        $eligibility1 = $row['eligibility1'];
        $eligibility2 = $row['eligibility2'];
        $eligibility3 = $row['eligibility3'];            
        $eligibility4 = $row['eligibility4'];
        $eligibility5 = $row['eligibility5'];



        echo '
        
        <div class="container">
        


            <div class="row">
            
                <div>
                
                
                    <h2 class="text-center mt-5 mb-5">'. ucwords($title) .'</h2>

                    <div class="education">

                    
                    <div class="container">
                    <h4 class="mt-4">'. ucfirst($name) .'</h4> 
                    <p><a href="https://www.apple.com/business/" class="px-2" style="text-decoration: none;">Website <i class="fas fa-external-link-alt"></i></a></p>
                        <h4 class="mt-4">Description</h4> 
                        <p>
                        '. $description .'
                        </p>

                    </div>

                    <div class="container pt-3">
                    <p> <strong>Type : '. ucfirst($type) .'</strong> </p>
                    <p> <strong>Category : '. ucfirst($category) .'</strong> </p>
                     ';

                    if($workfromhome == 1)
                    {
                        echo '<span style="color:green;"><i class="fas fa-map-marker-alt fa-lg"></i></span> <strong>Work From Home</strong> </p>';
                    }
                    else
                    {
                        echo '<p> <strong>Location : '. ucfirst($location) .'</strong> </p>';
                    }
                    
                    $phpdate = strtotime( $startDate );
                    $myFormatForView = date("m/d/y", $phpdate);
                    
                    
                    echo '
                    </div>

                    <div class="container mt-5">
                        <div class="row">
                        
                        <div class="col-md-4"><strong>Start Date : &nbsp&nbsp<span style="color:green"><i class="far fa-play-circle"></i></span>&nbsp&nbsp'. $myFormatForView .'</strong></div>

                        
                        <div class="col-md-4"><strong>Duration: &nbsp&nbsp<span style="color:green"><i class="far fa-calendar"></i></span>&nbsp&nbsp'. $duration .' days</strong></div>



                        
                        <div class="col-md-4">
                        
                        ';
                    if($paid == 1)
                    {
                        echo ' <p><strong>Stipend :&nbsp&nbsp&nbsp <span style="color:green"><i class="fas fa-coins"></i></span>&nbsp&nbsp'. $stipend .'/ Month</strong>
                        ';
                        if($negotiable == 1)
                        {
                            echo '<strong>&nbsp&nbsp&nbspNegotiable</strong></p>';
                        }

                        
                    }
                    else 
                    {
                        echo '<strong>Unpaid</strong>';
                    }
                    
                    echo'
                        
                        
                        
                        </div>
                        
                        </div>

                    </div>

                    <div class="container mt-4">';


                       

                    echo '
                    </div>

                    <div class="container">


                    
                    
                        <h4>Skills Required</h4>

                        <div>
                       <h6> <span class="badge rounded-pill bg-secondary py-1 my-1 px-2 mx-1">'. $skill1  .'</span>
                        <span class="badge rounded-pill bg-secondary py-1 my-1 px-2 mx-1">'. $skill2 .'</span>
                        <span class="badge rounded-pill bg-secondary py-1 my-1 px-2 mx-1">'. $skill3 .'</span>
                        <span class="badge rounded-pill bg-secondary py-1 my-1 px-2 mx-1">'. $skill4 .'</span>
                        <span class="badge rounded-pill bg-secondary py-1 my-1 px-2 mx-1">'. $skill5 .'</span>
                        <span class="badge rounded-pill bg-secondary py-1 my-1 px-2 mx-1">'. $skill6 .'</span>
                        <span class="badge rounded-pill bg-secondary py-1 my-1 px-2 mx-1">'. $skill7 .'</span>
                        <span class="badge rounded-pill bg-secondary py-1 my-1 px-2 mx-1">'. $skill8 .'</span>
                        <span class="badge rounded-pill bg-secondary py-1 my-1 px-2 mx-1">'. $skill9 .'</span>
                        <span class="badge rounded-pill bg-secondary py-1 my-1 px-2 mx-1">'. $skill10 .'</span></h6>
                        </div>

                      
                    
                    


                    </div>


                    <div class="container">
                    
                    <h4 class="pt-3">Eligibility</h4>';



      
                    
                    echo '<p> '. $eligibility1 .'</p>
                    <p> '. $eligibility2 .'</p>
                    <p> '. $eligibility3 .'</p>
                    <p> '. $eligibility4 .'</p>
                    <p> '. $eligibility5 .'</p>
                
                


                    </div>

                    <div class="container pt-3 mb-3">
                    
                        <strong>Openings : &nbsp&nbsp'. $openings .'</strong>
                    
                    </div>
            
                
                </div>
            
            
            </div>
        
        
        
        
        </div>

        
        
        ';

       








    }




    if(isset($_GET['apply']) && $_GET['apply'] == "true")
    {
        echo '
        
        <div class="text-center mb-4">
        <form action="../job_apply.php?job_id='. $job_id .'" method="post">
        <button type="submit" class="btn btn-success mt-4 ">Apply Now</a>
        </form>
        </div>
        
        ';
    } 



 

 mysqli_stmt_close($stmt);

     

 } 
 else
 {
     echo "Some error occured";
     exit();
 }








//  $here = mysqli_fetch_assoc($result);


    //checks here
    // if($here['user_email'] != $user_email)

    // if job_id belongs to email, then show all details of job
  






 ?>



</div>
</div>
 



<!-- scripts -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  

  
  </body>
</html>



























