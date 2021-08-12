<!--  asks user to post a job  -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Posted</title>



        <!-- google fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Roboto:wght@300&family=Rubik:wght@300&display=swap" rel="stylesheet">
    <style>
      *{
font-family: 'Rubik', sans-serif;}


  body{


  
background-image : linear-gradient(rgba(255,255,255,0.95), rgba(255,255,255,0.95)), url(../images/doodle.png);
background-position: center;
background-size: 900px 900px;



}
 .list{


  background-color: #f2f2f2;
  border-radius: 5%;

 } 
  


    </style>
  </head>
  <body>
 


<!-- navbar  -->

 <?php 
 include '../partials/_navbar2.php';
 include '../partials/_db-connection.php';


 ?>






    <!-- shows all the jobs posted by current user -->

 


    <div class="container">
    
    
        <div class="max-width-container mt-5">

<?php





$user_email = $_SESSION['useremail'];


$sql = "SELECT * FROM job_details WHERE user_email='$user_email'";

$result = mysqli_query($conn, $sql);


if(!$result)
{
    header("Location:../404.php");
}


$count = 1;
while($row = mysqli_fetch_assoc($result))
{
    $job_id = $row['job_id'];   
    $title = $row['job_title'];
    $type = $row['job_type'];
    $category = $row['job_category'];
    $paid = $row['paid'];
    if($paid == 1)
    {
        $paid = "paid";
    }
    else{
        $paid = "not paid";
    }

    echo ' <div class="row mt-5 mb-4 pt-3 pb-3 list">
            
    <div class="col-lg-8">
    <h4>'. $count++ .' &nbsp
    <strong>'. $title .'  </strong>|&nbsp&nbsp

    Type : '. $type .'|&nbsp&nbsp


    Category: '. $category .' |&nbsp&nbsp '. $paid .'



  
    
    </h4>
    </div>
    
    <div class="col-lg-4" style="padding-left:10px;">
    <a role="button" href="view_details.php?job_id='. $job_id .'" class="btn btn-sm mx-4" style="background-color: #44859e; color: white;">view details</a>
    <a role="button" href="applicants.php?job_id='. $job_id .'" class="btn  btn-sm" style="background-color: #44859e; color: white;">view applicants</a>
    </div>
    </div>
    ';
}



?>




</div>


</div>

   







        
       
           



<!-- scripts -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  

  
  </body>
</html>



























