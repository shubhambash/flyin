<!-- Resume Page / Final/ for the employee/user-->






<?php
include '../partials/_navbar.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
{
 Header("Location:../login_signup_page.php?login=true");
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

    <title>Resume</title>



   

</head>
  
<body>

<div class="container education mt-5 pt-5 ">

<div class="max-width-container">





<div class="mx-5 my-5">


    <?php

    include '../partials/_db-connection.php';
    $email = $_SESSION['useremail'];

    $sql = "SELECT user_first_name, user_last_name, user_contact, current_address_one, IFNULL(current_address_two,'--') AS sec From user_resume_basic_details WHERE user_email ='$email'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    echo '<h5>Name: '. $row['user_first_name'] .' '. $row['user_last_name'] .'<br><br> permanent address: '. $row['current_address_one'] .'<br><br> temporary address: '. $row['sec'] .'</h5>';



    $sql = "SELECT * FROM graduation_details gd
    INNER JOIN secondary_details sd ON gd.user_email = sd.user_email
    INNER JOIN senior_secondary_details ssd ON ssd.user_email = gd.user_email
    WHERE gd.user_email = '$email'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    echo '
    <div class="row px-5 py-5">
    
    <div class="col-md-4"><h4>Educational Details</h4></div>
    <div class="col-md-4">
    
    ';
   
    if(isset($row['graduation_completed']))
    {
                echo '<div class="graduation">
                <strong>'. $row['college'] .'</strong>
                <p>'. $row['start_year'] .'&nbsp&nbsp-&nbsp&nbsp'. $row['end year'] .'</p>
                <p>'. $row['degree'] .'</p>
                <p>'. $row['stream'] .'</p>
            </div>

        </div>
        <div class="col-md-4"><form action="../partials/user_resume/delete_records/delete_record.php?tableName=graduation_details" method="POST"><button type="submit" class="btn fas fa-trash"></a>&nbsp&nbsp&nbsp&nbsp<i class="fas fa-pen"></i></div></form>

        </div>';
    }
    else
    {
       echo '<a href="user_resume_page3.php" style="margin-left: 35%;>+ Add Graduation</a>';
    }
        

    echo '

    <div class="row px-5 py-5">
    
    <div class="col-md-4"></div>
    <div class="col-md-4">
    
    
    ';



    if(isset($row['completed_plus2']))
    {
                echo '<div class="graduation">
                <strong>'. $row['school_name'] .'</strong>
                <p>'. $row['completion_year'] .'</p>
                <p>'. $row['board'] .'</p>
                
            </div>

        </div>
        <div class="col-md-4"><form action="../partials/user_resume/delete_records/delete_record.php?tableName=senior_secondary_details" method="POST"><button type="submit" class="btn fas fa-trash"></a>&nbsp&nbsp&nbsp&nbsp<i class="fas fa-pen"></i></div></form>

        </div>';
    }
    else
    {
       echo '<a href="user_resume_page3.php" style="margin-left: 35%;>+ Add Plus 2</a>';
    }





    echo '

    <div class="row px-5 py-5">
    
    <div class="col-md-4"></div>
    <div class="col-md-4">
    
    
    ';



    if(isset($row['completed_secondary']))
    {
                echo '<div class="secondary">
                <strong>'. $row['school_name'] .'</strong>
                <p>'. $row['year_of_completion'] .'</p>
                <p>'. $row['board'] .'</p>
                
            </div>

        </div>
        <div class="col-md-4"><form action="../partials/user_resume/delete_records/delete_record.php?tableName=secondary_details" method="POST"><button type="submit" class="btn fas fa-trash"></a>&nbsp&nbsp&nbsp&nbsp<i class="fas fa-pen"></i></div></form>

        </div>';
    }
    else
    {
       echo '<a href="user_resume_page3.php" style="margin-left: 35%;>+ Add 10th</a>';
    }



  

    ?>
  
  <hr>



<!-- div.education ends here -->
</div>






<div class="mx-5 my-5 experience">



<?php


 //$email = $_SESSION['useremail'];


$sql = "SELECT * FROM job_experience_details WHERE user_email = '$email'";


$result = mysqli_query($conn, $sql);

if($result)
{

    $row = mysqli_fetch_assoc($result);

    echo '
    <div class="row px-5 py-5">

    <div class="col-md-4"><h4>Experience Details</h4></div>
    <div class="col-md-4">

    ';


 
    echo '<div class="jobexp">
            <strong>'. $row['title1'] .'</strong>
            <p>'. $row['company_name1'] .'</p>
            <strong>'. $row['title2'] .'</strong>
            <p>'. $row['company_name2'] .'</p>
            <strong>'. $row['title3'] .'</strong>
            <p>'. $row['company_name3'] .'</p>

        </div>

    </div>
    <div class="col-md-4"><form action="../partials/user_resume/delete_records/delete_record.php?tableName=job_experience_details" method="POST"><button type="submit" class="btn fas fa-trash"></a>&nbsp&nbsp&nbsp&nbsp<i class="fas fa-pen"></i></div></form>

    </div>';
}
else
{
   echo '<a href="user_resume_page4.php" style="margin-left: 35%;>+ Add Job Experience</a>';
}



$sql1 = "SELECT * FROM internship_experience_details WHERE user_email = '$email'";
$result1 = mysqli_query($conn, $sql1);

if($result1 && mysqli_num_rows($result1))
{

    $row = mysqli_fetch_assoc($result1);

    echo '
    <div class="row px-5 py-5">

    <div class="col-md-4"></div>
    <div class="col-md-4">

    ';


 
    echo '<div class="jobexp">
            <strong>'. $row['title1'] .'</strong>
            <p>'. $row['company_name1'] .'</p>
            <strong>'. $row['title2'] .'</strong>
            <p>'. $row['company_name2'] .'</p>
            <strong>'. $row['title3'] .'</strong>
            <p>'. $row['company_name3'] .'</p>

        </div>

    </div>
    <div class="col-md-4"><form action="../partials/user_resume/delete_records/delete_record.php?tableName=internship_experience_details" method="POST"><button type="submit" class="btn fas fa-trash"></a>&nbsp&nbsp&nbsp&nbsp<i class="fas fa-pen"></i></div></form>

    </div>';
}
else
{
   echo '<a href="user_resume_page4.php" style="margin-left: 35%; text-decoration:none;">+ Add skills</a>';
}

    


?>

<hr>




<!-- exp ends here -->
</div>






<div class="mx-5 my-5 skills">



<?php


 //$email = $_SESSION['useremail'];


$sql = "SELECT * FROM skills_details WHERE user_email = '$email'";


$result = mysqli_query($conn, $sql);

if($result && mysqli_num_rows($result))
{

    $row = mysqli_fetch_assoc($result);

    echo '
    <div class="row px-5 py-5">

    <div class="col-md-4"><h4>Skills Details</h4></div>
    <div class="col-md-4">

    ';


 
    echo '<div class="jobexp">
    <h5><span class="badge rounded-pill bg-secondary">'. $row['skill1'] .'</span>
    <span class="badge rounded-pill bg-secondary">'. $row['skill2'] .'</span>
    <span class="badge rounded-pill bg-secondary">'. $row['skill3'] .'</span>
    <span class="badge rounded-pill bg-secondary">'. $row['skill4'] .'</span>
    <span class="badge rounded-pill bg-secondary">'. $row['skill5'] .'</span>
    <span class="badge rounded-pill bg-secondary">'. $row['skill6'] .'</span>
    <span class="badge rounded-pill bg-secondary">'. $row['skill7'] .'</span>
    <span class="badge rounded-pill bg-secondary">'. $row['skill8'] .'</span>
    <span class="badge rounded-pill bg-secondary">'. $row['skill9'] .'</span>
    <span class="badge rounded-pill bg-secondary">'. $row['skill10'] .'</span></h5>
 
       

        </div>

    </div>
    <div class="col-md-4"><a href="user_resume_page5.php"><i class="fas fa-pen"></i></a></div>

    </div>';
}
else
{
   echo '<a href="user_resume_page4.php" style="margin-left: 35%;>+ Add Job Experience</a>';
}



?>





<!-- exp ends here -->
</div>





</div>

</div>

<div class="text-center mb-5 mt-5"><a role="button" href="../index.php" class="btn btn-primary">Explore Jobs/Internships</a></div> 


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>




