
<!-- page for type and area of work -->

<?php

    include '../partials/_navbar.php';
    if(isset($_GET['userName']) == "alreadySet")
    {
      echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
      <strong>'. $_SESSION['useremail'] .' your details have already been saved</strong> <a href="#">Edit details? or <a href="user_resume_page3.php">Proceed</a> with the resume</a>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }

?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


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


    <title>Hello, world!</title>
  </head>
  <body>
  <?php 

    

  ?>
<div class="container">

    <div class="max-width-container">





      <div class="row">
      
      <div class="col-md-3"></div>

      <div class="col-md-6 mt-5 mb-5 userDetails">
      


        <h3 class="text-center mt-5 mb-5">What are you current looking for?</h3>




            <div class="row">
            


            <!-- internship details  -->
                <div class="col-md-6  text-center">
                <form action="../partials/user_resume/_handleResume1.php" method="post">
                <input class="form-check-input" type="radio" name="internship" id="internship" onclick="showInternship()">
                    <label class="form-check-label" for="internship">
                    <h5 class="text-center">Internships</h5>
                    </label>
                    

                </div>



                <div class="col-md-6 text-center">

                <input class="form-check-input" type="radio" name="job" id="jobs"  onclick="showJob()">
                    <label class="form-check-label" for="jobs">
                        <h5 class="text-center">Jobs</h5>
                </label>

               
    

</div>
            
            </div>


            <div id="internship_details" style="display:none;">

              <div class="container">
              
                  <h4 class ="text-center mt-5">Internship Details</h4>


                  <div>
                  
                

                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">What fields are you interested to work in ?</label>


                                
                                  
                                  
                                  <input type="text" class="form-control mt-3 mb-3" name="field1" placeholder="e.g human resource" id="field1" onclick="showfield2()" required>
                                  <input type="text" class="form-control mt-3 mb-3" name="field2"  id="field2" placeholder="optional field"onclick="showfield3()" style = "display:none;" >
                                  <input type="text" class="form-control mt-3 mb-3" name="field3"  id="field3"placeholder="optional field" onclick="showfield4()" style = "display:none;">   
                                  <input type="text" class="form-control mt-3 mb-3" name="field4"  id="field4" placeholder="optional field" style = "display:none;">                                   
                                  





                              

                              
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <!-- <button class="btn btn-primary me-md-2" type="button">Button</button> -->
              
              <button type="submit" id="proceedButton" class="btn btn-success" style="display:none; width: 137.69px;">Save & Proceed</button>
            </div>

                  </form>

      




                  </div>

              </div>

            </div>

            <div id="job_details" style="display:none;">
            <h2 class="text-center">Sorry! This feature is currently unavailable</h2>
            </div>
      

      
      
      </div>

      <div class="col-md-3"></div>
      
      
      </div>
    


    
    </div>

</div>

 



<!-- display only the div that contains info of selected option (job/internships) -->
    <script>


if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

    
    function showInternship() {
   document.getElementById('internship_details').style.display = "block";
   document.getElementById('job_details').style.display = "none";
    }


    function showJob() {
   document.getElementById('job_details').style.display = "block";
   document.getElementById('internship_details').style.display = "none";
   
    }

    function showfield2(){

      document.getElementById('field2').style.display = "block";
      document.getElementById('proceedButton').style.display = "block";
      
    }
    function showfield3(){

document.getElementById('field3').style.display = "block";

}
function showfield4(){

document.getElementById('field4').style.display = "block";

}
    
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>




