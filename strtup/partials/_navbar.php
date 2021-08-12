<?php

session_start();


echo '<nav class="navbar navbar-expand-lg navbar-light bg-light pt-3 pb-3" style="    background-color: rgb(255, 255, 255);
box-shadow: 0 8px 16px rgb(0 0 0 / 8%);">
<div class="container-fluid">
  <a class="navbar-brand mx-2" href="../../../../../strtup">Flyin</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
      <li class="nav-item px-4">
        <a class="nav-link active" aria-current="page" href="../../strtup/display.php">Find Internships</a>
      </li>
      <li class="nav-item px-4">
        <a class="nav-link active" aria-current="page" href="#">Find Jobs</a>
      </li>
      <li class="nav-item dropdown px-4">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <bold>Resume</bold>
        </a>
        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="../../strtup/user_resume_pages/test.php">View Resume</a></li>
          <li><a class="dropdown-item" href="../../strtup/user_resume_pages/user_resume_page1.php">Build Resume</a></li>
          
          
        </ul>
      </li>
    
    </ul>';

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {

        echo '    
      <p class="text-light">Welcome ' . $_SESSION["useremail"].' </p>    
      <a  href="../../strtup/partials/_logout.php" role="button" class="btn mx-3" style="background-color: #44859e; color: white;">Logout</a>';

      echo  '</div>
      </div>
      </nav>';
      
     
    }
    else 
    {
      echo '    
      
      <li class="nav-item dropdown dropdown-hover" style="list-style-type: none;">
      <button class="btn dropdown-toggle" id="navbarDropdown" style="background-color: #44859e; color: white;" data-bs-toggle="dropdown"1>
        Register
      </button>
      <div class="dropdown-menu dropdown-menu-center">

     

   

            <ul class="dropdown-menu-part">

              <li class="item" style="list-style-type:none;">
                  
                <a class="dropdown-item item-link" href="login_signup_page.php?">As a student</a>

              </li>

              <li class="item" style="list-style-type:none;">
                  
                <a class="dropdown-item item-link" href="login_signup_page1.php?" disabled>As an employer</a>

              </li>

            </ul>

          



      </div>



  <button type="button" class="btn  mx-2" style="background-color: #44859e; color: white;" data-bs-toggle="modal" data-bs-target="#loginModal">
  Login
</button>

  
  </div>
</div>
</nav>';

    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false" && isset($_GET['accountVerified']) && $_GET['accountVerified']  == "0")
      {
        echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
        <strong>Email not verified</strong> Please verify your account by clicking the link sent to your email
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
      else if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false")
      {
        echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
        <strong>Incorrect username or password</strong> Please <a href="../../strtup/login_signup_page.php?signup=true">register</a> if you haven\'t already
        or <a href="../../strtup/login_signup_page.php?login=true">try again</a><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
      

  }




if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true" && isset($_GET['verificationSent']) && $_GET['verificationSent'] == "1")

{


    header("Location: ../strtup/verify_email_page.php");
  

}
else if(isset($_GET['error']) && $_GET['error'] == "UserAlreadyExists")
{

    echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
    <strong>User already exists</strong> You may now login 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';



}
else if (isset($_GET['error']) && $_GET['error'] == "PasswordsNotMatched")
{
  echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
  <strong>Passwords do not match</strong> Please try again
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}



if( isset($_GET['accountVerified']) && $_GET['accountVerified']  == "1" && isset($_GET['isEmployer']))
{
  $isEmployer = $_GET['isEmployer'];
  
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Email Verified</strong> You may now login 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}

if(isset($_GET['error']) && $_GET['error'] == "UserNotFound")
{
  echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
  <strong>User not found</strong> Please <a href="../../strtup/login_signup_page.php?signup=true&as=employee">register</a> first 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}





include '_loginModal.php';




?>