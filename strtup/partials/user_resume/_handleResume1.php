<?php


// handles resume from user_resume_page2.php

// the data will be stored in table `user_resume_stage_1`




if($_SERVER['REQUEST_METHOD'] == "POST")
{
    include '../_db-connection.php';

    session_start();




    $user_email = $_SESSION['useremail'];
    $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";


    $existUser = "SELECT * FROM `user_resume_stage1` WHERE user_email='$user_email'";

    $result = mysqli_query($conn, $existSql);
    $existUserResult = mysqli_query($conn, $existUser);

    $numRows = mysqli_num_rows($result);
    $numUser = mysqli_num_rows($existUserResult);

    

    if($numRows == 0)
    {
        exit();
    }
    else 
    {
        if($numUser == 1)
            {
                header("Location: ../../user_resume_pages/user_resume_page2.php?userName=alreadySet");
            }
            else 
            {
                if(isset($_POST['internship']) && $_POST['internship'] == "on")
                {
        
                    // if the user clicks internships
                    $internship = 1;
                    $job = 0;
                    $user_field_of_work1 = $_POST['field1'];
        
                    if(isset($_POST['field2']))
                    {
                        $user_field_of_work2 = $_POST['field2'];
                    }
        
                    if(isset($_POST['field3']))
                    {
                        $user_field_of_work3 = $_POST['field3'];
                    }
        
                    if(isset($_POST['field4']))
                    {
                        $user_field_of_work4 = $_POST['field4'];
                    }
        
        
        
                    $sql = "INSERT INTO `user_resume_stage1` (`user_email`, `internship`, `job`, `user_field_of_work1`, `user_field_of_work2`, `user_field_of_work3`, `user_field_of_work4`) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    // $existUserResult = mysqli_query($conn, $sql);


                    if($stmt = mysqli_prepare($conn, $sql))
                    {
                        mysqli_stmt_bind_param($stmt,"sssssss",$user_email, $internship, $job, $user_field_of_work1, $user_field_of_work2, $user_field_of_work3, $user_field_of_work4);
                        mysqli_stmt_execute($stmt);
                
                        $result = mysqli_stmt_get_result($stmt);
                        
        
                        
                        if(!$result)
                        {
                            header("Location: ../../user_resume_pages/user_resume_page3.php");
                        }
                        else{
                            header("Location: ../../user_resume_pages/user_resume_page2.php");
                        }
        
                   
        
                    
        
                    mysqli_stmt_close($stmt);
                
                        
                
                    } 
                    else
                    {
                        echo "Some error occured";
                        exit();
                    }



                
                }
              
                else if(isset($_POST['job']) && $_POST['job'] == "on"){
        
                    // if the user clicks jobs
        
                }
            
            }
    }

     

        

    

    
}
else 
{
    echo 'not post';
}


?>