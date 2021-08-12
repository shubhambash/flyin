<?php


// handles the post request from user_resume_page1.php

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        
        include '../_db-connection.php';

        session_start();
        if(!isset($_SESSION['useremail']))
        {
            header("Location: ../../login_signup_page.php?login=true");
        }
        $user_email = $_SESSION['useremail'];
        $user_first_name = $_POST['firstName'];
        $user_last_name = $_POST['lastName'];
        $user_contact = $_POST['contact'];
        $user_first_city = $_POST['currentAddressOne'];
        $user_second_city = $_POST['currentAddressTwo'];
        


        
        $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
        $existUser = "SELECT * FROM `user_resume_basic_details` WHERE user_email='$user_email'";


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
                header("Location: ../../user_resume_pages/user_resume_page1.php?userName=alreadySet");
            }

            else{


                
                // $checkContactsql = "SELECT * FROM `user_resume_basic_details` WHERE user_contact=$user_contact";
                // $resultContactsql = mysqli_query($conn, $checkContactsql);

                $checkContactsql = "SELECT * FROM `user_resume_basic_details` WHERE user_contact= ?";


                if($stmt = mysqli_prepare($conn, $checkContactsql))
                {
                    mysqli_stmt_bind_param($stmt,"s", $user_contact);
                    mysqli_stmt_execute($stmt);
            
                    $resultContactsql = mysqli_stmt_get_result($stmt);

                    
                if($resultContactsql)
                {
                    $numContacts = mysqli_num_rows($resultContactsql);

                    if($numContacts >= 1)
                    {
                        header("Location: ../../user_resume_pages/user_resume_page1.php?userContact=alreadyUsed");
                        exit();
                    }
                }

                mysqli_stmt_close($stmt);
            
                    
            
                }



            

            $sql =  "INSERT INTO `user_resume_basic_details` (`user_email`, `user_first_name`, `user_last_name`, `user_contact`, `current_address_one`, `current_address_two`) VALUES (?, ?, ?, ?, ?, ?)";
            // $result = mysqli_query($conn,$sql);

            if($stmt = mysqli_prepare($conn, $sql))
            {
                mysqli_stmt_bind_param($stmt,"ssssss", $user_email, $user_first_name, $user_last_name, $user_contact, $user_first_city, $user_second_city);
                mysqli_stmt_execute($stmt);
        
                $result = mysqli_stmt_get_result($stmt);
                echo var_dump($result);
        
                
        

           

            if(!$result)
            {
                 
                 header("Location: ../../user_resume_pages/user_resume_page2.php");
            }
            else
            {
                echo "some problem occured";
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