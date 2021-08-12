<?php

include 'partials/_navbar.php';


?>

<!doctype html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <!-- style links -->
    <link rel="stylesheet" href="css/joblist.css">



    <link rel="stylesheet" href="css/_dispStyle.css">


    <!-- font awesome for icons  -->

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Roboto:wght@300&family=Rubik:wght@300&display=swap" rel="stylesheet">
    <style>
      *{
font-family: 'Rubik', sans-serif;}


.wrap{


  
background-image : linear-gradient(rgba(255,255,255,0.97), rgba(255,255,255,0.97)), url(images/doodle.png);
background-position: center;
background-size: 900px 900px;

}
    </style>
    
    
    
    <title>List of Jobs/Internships</title>

   
  </head>
  <body>
  





<div class="wrap">



    
    
  




<div class="row mt-5 pt-5">

<!-- 1062 721 -->


  <div class="col-lg-4 one">
  
  <form action="" method="post" style="margin-left: 10rem;">
              
              <div class="card cardDiv" style="width: 18rem;">
    
            <div class="card-body">
              
              <h5 class="card-title">Filters</h5>
            
            </div>
    
          
          <div class="container">
    
          <label for="">Category</label>
          
          <input type="text" name="category"  class="form-control" aria-describedby="passwordHelpBlock" required>
    
          
          </div>
    
    
    
    
    
          <div class="container mt-3">
    
          <label for="">Location</label>
    
          <input type="text" name="location" id="location" class="form-control" aria-describedby="passwordHelpBlock" required>
    
    
          </div>
    
          <div class="container mt-4">
    
    
            <div class="row">
    
    
              <div class="col">
                work from home
              </div>
    
              <div class="col">
              <div class="form-check form-switch">
    
                <input class="form-check-input" name="wfh" type="checkbox" id="flexSwitchCheckDefault" onclick="disableLocation()">
                
              </div>
    
    
              </div>
    
            </div>
    
    
    
    
    
          </div>
    
    
    
    
          <div class="container mt-4">
    
    
          <label > Desired Monthly income</label>
    
    
    
          <div class="slidecontainer mt-3">
            <input type="range" min="1" max="100" value="50" class="slider" id="myRange" required>
          </div>
    
    
    
    
    
          </div>
    
          <div class="container mt-1">
    
    
          0&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp2k&nbsp&nbsp&nbsp&nbsp&nbsp4k&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp6k&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp8k&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp10k
    
    
    
          </div>
    
          <input type="text" name="stipend" id="stipend" style="display:none;">
    
    
          <div class="container text-center">
    
    
          <button type="submit" class="btn btn-primary btn-sm mt-4 mb-4">Apply</button>
    
    
          </div>
    
    
    
            
    
    
    
    
    
          </form>
    
    
    
  </div>
  
  </div>



      <div class="col-lg-8">
      
      
     



      <?php

include 'partials/_db-connection.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{



  //if request has been made from search bar

  if(isset($_POST['search']))
  {



      //get category to search for
      
      $category = $_POST['search'];

      $sql = "SELECT * FROM job_details WHERE job_category = ?";


      if($stmt = mysqli_prepare($conn, $sql))
      {
          mysqli_stmt_bind_param($stmt, "s", $category);

          mysqli_stmt_execute($stmt);


          $result = mysqli_stmt_get_result($stmt);


          //if result then display


          if($result)
  {


    while($row = mysqli_fetch_assoc($result))
    {

        $id = $row['job_id'];
        $name = $row['company_name'];
        $title = $row['job_title'];
        
        $start = $row['start_date'];
        $duration = $row['duration'];
        $stipend = $row['stipend'];
        $wfh = $row['work_from_home'];
        $type = $row['job_type'];
        if($wfh == 1)
        {
          $location = "work from home";
        }
        else
        {
          $location = $row['location'];
        }
        

        $phpdate = strtotime( $start );
        $mysqldate = date( 'd/m', $phpdate );

        echo 
        '
              <div class="row mb-5">
              <div class="card cardDiv " style="width: 30rem; margin: auto;display: block;">
                  <div class="card-body">
                    <h5 class="card-title">'. $title .'</h5>
                    <h6 class="card-subtitle mb-2 text-muted">'. $name .'</h6>
                    
                    <div><span style="color:green"><i class="fas fa-map-marker-alt "></i></span>&nbsp&nbsp&nbsp'. $location .'</div>
                    <div class="row pt-2 pb-2">
                    <div class="col-md-4">Starts: '. $mysqldate .'</div>
                    <div class="col-md-4">Duration: '. $duration .' days</div>
                    <div class="col-md-4">Stipend: &#8377;'. $stipend .'</div>

                    </div>
                    <div>
                    <span class="badge rounded-pill bg-secondary">'. $category .'</span>
                    <span class="badge rounded-pill bg-secondary">'. $type .'</span>
                    </div>


                    <div class="pt-2 pb-2" style="float: right;"><a role="button" class="btn btn-primary btn-sm mb-1"  href="posted_jobs_pages/view_details.php?job_id='. $id .'&apply=true">view details</a> </div>
     


             
                  </div>
              </div>
              </div>
        
        
        ';



    }
  }

  else
  {
    echo '<h2> No such results found</h2>';
  }






          
          mysqli_stmt_close($stmt);
      }




  }
  
  else

  {

  $category = $_POST['category'];
  if(isset($_POST['location']))
  {
    $location = $_POST['location'];
  }
  else
  {
    $location = "";
  }

  if(isset($_POST['wfh']))
  {
    $wfh = 1;
  }
  else
  {
    $wfh = 0;
  }
  
  $stipend = $_POST['stipend'] * 100;
  $low = $stipend - 1000;
  $high = $stipend + 1000;

  $sql = "SELECT `job_id`,`company_name`, `job_type`, `job_title`, `job_category`, `work_from_home`, `location`, `start_date`, `duration`, `paid`, `stipend` FROM job_details WHERE  job_category = '$category' AND work_from_home = $wfh AND stipend BETWEEN $low AND $high";
  $result = mysqli_query($conn, $sql);




  if($result)
  {


    while($row = mysqli_fetch_assoc($result))
    {

       $id = $row['job_id'];
        $name = $row['company_name'];
        $title = $row['job_title'];
        
        $start = $row['start_date'];
        $duration = $row['duration'];
        $stipend = $row['stipend'];
        $wfh = $row['work_from_home'];
        $type = $row['job_type'];
        if($wfh == 1)
        {
          $location = "work from home";
        }
        else
        {
          $location = $row['location'];
        }
        

        $phpdate = strtotime( $start );
        $mysqldate = date( 'd/m', $phpdate );

        echo 
        '
              <div class="row mb-5">
              <div class="card cardDiv " style="width: 30rem; margin: auto;display: block;">
                  <div class="card-body">
                    <h5 class="card-title">'. $title .'</h5>
                    <h6 class="card-subtitle mb-2 text-muted">'. $name .'</h6>
                    
                    <div><span style="color:green"><i class="fas fa-map-marker-alt "></i></span>&nbsp&nbsp&nbsp'. $location .'</div>
                    <div class="row pt-2 pb-2">
                    <div class="col-md-4">Starts: '. $mysqldate .'</div>
                    <div class="col-md-4">Duration: '. $duration .' days</div>
                    <div class="col-md-4">Stipend: &#8377;'. $stipend .'</div>

                    </div>
                    <div>
                    <span class="badge rounded-pill bg-secondary">'. $category .'</span>
                    <span class="badge rounded-pill bg-secondary">'. $type .'</span>
                    </div>

                    <div class="pt-2 pb-2" style="float: right;"><a role="button" class="btn btn-primary btn-sm mb-1"  href="posted_jobs_pages/view_details.php?job_id='. $id .'&apply=true">view details</a> </div>

        


             
                  </div>
              </div>
              </div>
        
        
        ';



    }
  }

  else
  {
    echo '<h2> No such results found</h2>';
  }

      
}


}
else
{
  $sql = "SELECT `job_id`,`company_name`, `job_type`, `job_title`, `job_category`, `work_from_home`, `location`, `start_date`, `duration`, `paid`, `stipend` FROM job_details WHERE  1 LIMIT 7";
  $result = mysqli_query($conn, $sql);


  if($result)
  {


    while($row = mysqli_fetch_assoc($result))
    {
        $id = $row['job_id'];
        $category = $row['job_category'];
        $name = $row['company_name'];
        $title = $row['job_title'];
        
        $start = $row['start_date'];
        $duration = $row['duration'];
        $stipend = $row['stipend'];
        $wfh = $row['work_from_home'];
        $type = $row['job_type'];

        if($wfh == 1)
        {
          $location = "work from home";
        }
        else
        {
          $location = $row['location'];
        }
        

        $phpdate = strtotime( $start );
        $mysqldate = date( 'd/m', $phpdate );

        echo 
        '
              <div class="row mb-5">
              <div class="card cardDiv " style="width: 30rem; margin: auto;display: block;">
                  <div class="card-body">
                    <h5 class="card-title">'. $title .'</h5>
                    <h6 class="card-subtitle mb-2 text-muted">'. $name .'</h6>
                    
                    <div><span style="color:green"><i class="fas fa-map-marker-alt "></i></span>&nbsp&nbsp&nbsp'. $location .'</div>
                    <div class="row pt-2 pb-2">
                    <div class="col-md-4">Starts: '. $mysqldate .'</div>
                    <div class="col-md-4">Duration: '. $duration .' days</div>
                    <div class="col-md-4">Stipend: &#8377;'. $stipend .'</div>

                    </div>
                    <div>
                    <span class="badge rounded-pill bg-secondary">'. $category .'</span>
                    <span class="badge rounded-pill bg-secondary">'. $type .'</span>
                    </div>


                    <div class="pt-2 pb-2" style="float: right;"><a role="button" class="btn btn-primary btn-sm mb-1"  href="posted_jobs_pages/view_details.php?job_id='. $id .'&apply=true">view details</a> </div>

             
                  </div>
              </div>
              </div>
        
        
        ';



    }
  }
}


?>




    



      
      
      </div>


  
    
          


<!-- row end -->
      </div> 




    


















<script>


//prevents the confirm resubmission popup
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

var slider = document.getElementById("myRange");
var output = document.getElementById("stipend");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  
  output.value = this.value;


}

function disableLocation()
{
  document.getElementById("location").disabled = true;
}


</div>




</script>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


  
  </body>
</html>


