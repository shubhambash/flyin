
<?php 

include 'config.php';


$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];

 



  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

 

  if(!empty($data['email']))
  {
   $_SESSION['useremail'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{

 $login_button = '<a  href="'.$google_client->createAuthUrl().'"> <button class="btn btn-outline-primary">   <img class="google-icon" style="width: 2rem; height: 2rem;" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>Login with Google</button></a>';
}



?>





<div class="container main">


  <div class="max-width-container">
  
    <div class="row">
    
    

      <div class="col-lg-5 offset-lg-7">
      

      <div class="formdiv">
      
      <h3 class="mt-4 mb-4">Register and Find Internships/Jobs</h3>











        <form action="partials/_handleSignup.php" class="employee" method ="post">
          <div class="mb-3">
            <label for="signupEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="signupPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="signupPassword" id="signupPassword" required>
          </div>

          <div class="mb-3">
            <label for="signupcPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="signupcPassword" id="signupcPassword" required>
          </div>

          
          <button type="submit" class="btn btn-primary mt-4" >Submit</button>
        </form>


        <hr>

      <?php
      if($login_button == '')
      {
        


      include '_db-connection.php';

      $user_email = $_SESSION['useremail'];

      
     


    //using prepared stmt to avoid sql injection 

        $sql = "SELECT * FROM users WHERE user_email = '$user_email'";
        $result = mysqli_query($conn, $sql);

        $numRows = mysqli_num_rows($result);

        

        // check if email exists

        if($numRows > 0)
        {
            $_SESSION['loggedin'] = true;
            header("Location: /strtup/index.php?loginsuccess=true");
            exit();
        }
        else
        {

          $filledResume = 0;
          $isEmployer = 0;

          $sql = "INSERT INTO `users` (`user_email`, `is_employer`,`filled_resume`) VALUES (?, ?, ?, ?, ?)";

          if($stmt = mysqli_prepare($conn, $sql))
          {
              mysqli_stmt_bind_param($stmt, "sss", $user_email, $isEmployer, $filledResume);

              mysqli_stmt_execute($stmt);

              mysqli_stmt_close($stmt);
              header("Location: /strtup/index.php?loginsuccess=true");
              exit();

          }
          else
          {

            //if access token set
            echo '<a  href="../../strtup/partials/_logout.php" role="button" class="btn btn-outline-success mx-3" >Logout</a>';
          }
        }

      }
      else
      {
      echo '<div class="text-center">'.$login_button . '</div>';
      }
      ?>



</div>


          




        </div>









      
      </div>
    
    </div>
  
  </div>


</div>

</div>

  






















<!-- 
<h3 class="text-center mt-4 mb-4">Register and Find Internships/Jobs</h3>



<div class="row">

<div class="col-md-3"></div>



      <div class="col-md-6">


        <form action="partials/_handleSignup.php" method ="post">
          <div class="mb-3">
            <label for="signupEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp">
          
          <div class="mb-3">
            <label for="signupPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="signupPassword" id="signupPassword">
          </div>

          <div class="mb-3">
            <label for="signupcPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="signupcPassword" id="signupcPassword">
          </div>

          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>


      </div>




<div class="col-md-3"></div>



</div>


<h3 class="text-center">Or</h3>


<h3 class="text-center mt-4 mb-4">Register as an Employer</h3>

<div class="row">

<div class="col-md-3"></div>



      <div class="col-md-6">


        <form action="partials/_handle_employer_signup.php" method ="post">
          <div class="mb-3">
            <label for="signupEmail" class="form-label">Official Email</label>
            <input type="email" class="form-control" id="signupEmail" name="signupEmail" placeholder="e.g. name@company.com" aria-describedby="emailHelp">
          
          <div class="mb-3">
            <label for="signupPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="signupPassword" id="signupPassword">
          </div>

          <div class="mb-3">
            <label for="signupcPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="signupcPassword" id="signupcPassword">
          </div>

          <div class="mb-3">
            <label for="contact" class="form-label">Mobile number</label>
            <input type="number" class="form-control" name="contact" id="contact">
          </div>

          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>


      </div>




<div class="col-md-3"></div>



</div>


 -->
