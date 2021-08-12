<?php

    include '_db-connection.php';

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $email = $_POST['loginEmail'];
        $pass = $_POST['loginPassword'];

        //using prepared statement to prevent sql injection


        $sql = "SELECT * FROM `users` WHERE user_email= '$email'";
        $result = mysqli_query($conn, $sql);

     
  
          // $row = mysqli_fetch_assoc($result);
          // echo $row['user_email'];
         
      


        if($result)
        {

          $numRows = mysqli_num_rows($result);

       

        if($numRows == 1)
        {
            
            $row = mysqli_fetch_assoc($result);
            if($row['verified'] == 0)
            {
                header("Location: ../index.php?loginsuccess=false&accountVerified=0");
                exit();
            }
            
            if(password_verify($pass, $row['user_password']))
            {
                session_start();
                echo 'pass';
                $_SESSION['loggedin'] = true;
                $_SESSION['useremail'] = $email;


            
              
              if( $row['is_employer']) 
            //   if user is an employer
              {
                  header("Location: /strtup/index2.php?loginsuccess=true");
                  exit();
              }
              else 
            //    if user is an employee
              {
                header("Location: /strtup/index.php?loginsuccess=true");
                exit();
              }


        
                
                

            }
            else 
            {
                echo 'unable to login';
                header("Location: ../index.php?loginsuccess=false");
                exit();
            }


        }
        exit();
        header("Location: ../login_signup_page.php?signup=true&error=UserNotFound&");

      }
    }



?>