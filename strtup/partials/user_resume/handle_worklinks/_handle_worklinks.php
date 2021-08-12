<?php


// handles the post request from user_resume_page6.php

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        
        include '../../_db-connection.php';

        session_start();
        if(!isset($_SESSION['useremail']))
        {
            header("Location: ../../login_signup_page.php?login=true");
        }
        $user_email = $_SESSION['useremail'];

        $github = $_POST['github'];
        $portfolio = $_POST['portfolio'];
        $playstore = $_POST['playstorelink'];
        $blog = $_POST['blogsite'];

        
        $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
        $existUser = "SELECT * FROM `worklink_details` WHERE user_email='$user_email'";


        $existUserResult = mysqli_query($conn, $existUser);
        $result = mysqli_query($conn, $existSql);

        $numUser = mysqli_num_rows($existUserResult);
        $numRows = mysqli_num_rows($result);

        if($numRows == 0)
        {
            exit();
        }
        
        
        else
        {


            if($numUser == 1)
            {


                $sql = " UPDATE `worklink_details` SET `github`=?,`portfolio`=?,`blogsite`=?,`playstorelink`=? WHERE user_email = ?";
                if($stmt = mysqli_prepare($conn, $sql))
                {
                    mysqli_stmt_bind_param($stmt,"sssss",  $github, $portfolio, $blog, $playstore, $user_email);
                    mysqli_stmt_execute($stmt);
            
                    $result = mysqli_stmt_get_result($stmt);
                    
    
                    
                    if(!$result)
                    {

                        
                        header("Location: ../../../../strtup/user_resume_pages/user_resume_page6.php?success=true");
                        exit();
                    }
                    else{
                        header("Location: ../../../../strtup/user_resume_pages/user_resume_page6.php?errorOccured");
                        exit();
                    }
    
            
    
                
    
                mysqli_stmt_close($stmt);
            
                    
            
                } 
                else
                {
                    echo "Some error occured";
                    exit();
                }


            

            

            

                header("Location: ../../../user_resume_pages/user_resume_page6.php?userField=alreadySet");
                exit();
            }


            else
            {
            


            

            $sql =  "INSERT INTO `worklink_details` (`user_email`, `github`, `portfolio`, `blogsite`, `playstorelink`) VALUES (?,?,?,?,?)";
            
            if($stmt = mysqli_prepare($conn, $sql))
            {
                mysqli_stmt_bind_param($stmt,"sssss", $user_email, $github, $portfolio, $blog, $playstore );
                mysqli_stmt_execute($stmt);
        
                $result = mysqli_stmt_get_result($stmt);
                

                
                if(!$result)
                {
                    $sql = "UPDATE users SET filled_resume = 1 WHERE user_email = '$user_email'";
                    $result = mysqli_query($conn, $sql);
                    
                    header("Location: ../../../../strtup/user_resume_pages/user_resume_page6.php?success=true");
                    exit();
                }
                else{
                    header("Location: ../../../../strtup/user_resume_pages/user_resume_page6.php?errorOccured");
                    exit();
                }

        

            

            mysqli_stmt_close($stmt);
        
                
        
            } 
            else
            {
                echo "Some error occured";
                exit();
            }

            }
            
        
      
            
        }

    }
    else 
    {
        echo "not post method";
    }
   
?>