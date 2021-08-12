<!-- page for profile links -->






<?php

    include '../partials/_navbar.php';
    if(isset($_GET['userField']) && $_GET['userField'] == "alreadySet")
    {
      echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
      <strong>'. $_SESSION['useremail'] .' your details have already been saved</strong> <a href="#">Edit details? or <a href="user_resume_page2.php">Proceed</a> with the resume</a>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }

    if(isset($_GET['userField']) && $_GET['userField']== "set")
    {
      echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
      <strong>Details Saved!</strong> <a href="#"> Edit details? </a>or<a href="user_resume_page2.php"> Proceed</a> with the resume</a>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    if(isset($_GET['error']) && $_GET['error'] =="reEnterData")
    {
      echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
      <strong>An Error Occured</strong>  Please re-enter your details
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }


    if(isset($_GET['success']) && $_GET['success'] =="true")
    {
      echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
      <strong> saved successfully</strong> 
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


    <link rel="stylesheet" href="../css/user_resume_page.css">



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

<div class="container">

    <div class="max-width-container">





      <div class="row">
      
      <div class="col-md-3"></div>

      <div class="col-md-6 mt-5 mb-5 userDetails">
      
      

            <h3 class="text-center mt-5 mb-5">Work Samples</h3>

            <div class="max-width-container education">
            

              <form action="../partials/user_resume/handle_worklinks/_handle_worklinks.php" method="post" class="px-5 pb-5 mx-5 my-5">

                    <div class="mb-3">

                        <label for="github" class="form-label">GitHub Profile</label>
                        <input type="url" name="github" placeholder="http://github.com/my_profile" class="form-control" id="github" aria-describedby="emailHelp">
                        

                    </div>


                        <div class="mb-3">

                                        <label for="blogsite" class="form-label">Blog link</label>
                                        <input type="url" name="blogsite" class="form-control" id="blogsite" placeholder="http://myblog.com" aria-describedby="emailHelp">


                    </div>



                    <div class="mb-3">

                                        <label for="portfolio" class="form-label">Portfolio link</label>
                                        <input type="url" name="portfolio" placeholder="http://myportfolio.com" class="form-control" id="portfolio" aria-describedby="emailHelp">


                    </div>


                    <div class="mb-3">

                                        <label for="playstorelink" class="form-label">Playstore developer A/C link</label>
                                        <input type="url" name="playstorelink" class="form-control" id="playstorelink" placeholder="http://play.google.com/store/apps/developer/id=myapps" aria-describedby="emailHelp">


                    </div>

<!-- 
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
              <button  type="submit" id="proceedButton" class="btn btn-outline-primary" style="width: 137.69px;">Complete</a>
             
            </div> -->


            <button type="submit" class="btn btn-primary">Save</button>

  

              </form>


            </div>


            <div class="row">
                                  
                                  <div class="col  "><div class="d-grid gap-2 justify-content-md-start mt-4 "><button type="button" class="btn btn-outline-primary" onclick="history.back()" style="width:137.69px;">return</button> </div>
                                  </div>
                                  <div class="col  "><div class="d-grid gap-2 justify-content-md-end mt-4 "><a role="button" class="btn btn-outline-primary" href="test.php" style="width:137.69px;">proceed</a> </div>
                                  </div>
                                  
            </div>
      
      
      </div>




      <div class="col-md-3"></div>
      
      
      </div>
    


    
    </div>

</div>





<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>




