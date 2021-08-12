<!-- page for skills  -->






<?php

    include '../partials/_navbar.php';
    if(isset($_GET['userField']) && $_GET['userField'] == "alreadySet")
    {
      echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
      <strong>'. $_SESSION['useremail'] .' your details have already been saved</strong> <a href="#">Edit details? or <a href="user_resume_page6.php">Proceed</a> with the resume</a>
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
      
      

            <h3 class="text-center mt-5 mb-5">Skills</h3>

            <div class="max-width-container education">
            

              <form action="../partials/user_resume/handle_skills/_handle_skills.php?edit=true" method="post" class="px-5 pb-5 mx-5 my-5">
              

                      <div class="mb-3">

                        <label  class="form-label pt-4">Add your skills</label>
                        <input type="text" class="form-control"  placeholder="e.g. HTML" name="skill1" id="skill1" onclick="showskill2()">
                        
                      </div>

                      <div class="mb-3">

                       
                        <input type="text" class="form-control" style="display:none;"  placeholder="e.g. HTML" name="skill2" id="skill2" onclick="showskill3()">
                        
                      </div>



                       <div class="mb-3">

                        
                        <input type="text" class="form-control" style="display:none;" placeholder="e.g. HTML" name="skill3" id="skill3" onclick="showskill4()">
                        
                      </div>



                      <div class="mb-3">

                        
                        <input type="text" class="form-control" style="display:none;" placeholder="e.g. HTML" name="skill4" id="skill4" onclick="showskill5()">
                        
                      </div>
                      

                        <div class="mb-3">

                                                
                          <input type="text" class="form-control" style="display:none;" placeholder="e.g. HTML" name="skill5" id="skill5" onclick="showskill6()">

                        </div>


                        <div class="mb-3">

                                                
                          <input type="text" class="form-control" style="display:none;" placeholder="e.g. HTML" name="skill6" id="skill6" onclick="showskill7()">

                        </div>




                        <div class="mb-3">

                                                
                          <input type="text" class="form-control" style="display:none;" placeholder="e.g. HTML" name="skill7" id="skill7" onclick="showskill8()">

                        </div>




                        <div class="mb-3">

                                                
                          <input type="text" class="form-control" style="display:none;" placeholder="e.g. HTML" name="skill8" id="skill8" onclick="showskill9()">

                        </div>



                        <div class="mb-3">

                                                
                          <input type="text" class="form-control" style="display:none;" placeholder="e.g. HTML" name="skill9" id="skill9" onclick="showskill10()">

                        </div>


                        <div class="mb-3">

                                                
                          <input type="text" class="form-control" style="display:none;" placeholder="e.g. HTML" name="skill10" id="skill10">

                        </div>
                      
                                           

                                                                                             
               

                          <button type="submit" class="btn btn-primary">Save</button>


                     

              </form>


            </div>


            <div class="row">
                                  
                                  <div class="col  "><div class="d-grid gap-2 justify-content-md-start mt-4 "><button type="button" class="btn btn-outline-primary" onclick="history.back()" style="width:137.69px;">return</button> </div>
                                  </div>
                                  <div class="col  "><div class="d-grid gap-2 justify-content-md-end mt-4 "><a role="button" class="btn btn-outline-primary" href="user_resume_page6.php" style="width:137.69px;">proceed</a> </div>
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





    function showskill2()
    {
        document.getElementById('skill2').style.display = "block";
    }

    function showskill3()
    {
        document.getElementById('skill3').style.display = "block";
    }


    function showskill4()
    {
        document.getElementById('skill4').style.display = "block";
    }


    function showskill5()
    {
        document.getElementById('skill5').style.display = "block";
    }

    function showskill6()
    {
        document.getElementById('skill6').style.display = "block";
    }


    function showskill7()
    {
        document.getElementById('skill7').style.display = "block";
    }


    function showskill8()
    {
        document.getElementById('skill8').style.display = "block";
    }

    function showskill9()
    {
        document.getElementById('skill9').style.display = "block";
    }


    function showskill10()
    {
        document.getElementById('skill10').style.display = "block";
    }



</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>




