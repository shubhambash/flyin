<?php

// handles the user input from _graduationModal.php


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    include '../../_db-connection.php';
    session_start();
    if(!isset($_SESSION['useremail']))
    {
        header("Location: ../../login_signup_page.php?login=true");
        exit();
    }




    $user_email = $_SESSION['useremail'];
   
    $collegeName = $_POST['collegeName'];
    $startYear = $_POST['startYear'];
    $endYear = $_POST['endYear'];
    $degree = $_POST['degree'];
    $stream = $_POST['stream'];


    $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";


    $existUser = "SELECT * FROM `graduation_details` WHERE user_email='$user_email'";

    $result = mysqli_query($conn, $existSql);
    
    $existUserResult = mysqli_query($conn, $existUser);

    $numRows = mysqli_num_rows($result);
    $numUser = mysqli_num_rows($existUserResult);

    if($numRows == 0)
    {
        exit();
    }
    else{


        if($numUser == 1)
        {
            
                // If the user has resquested to edit then this block of code will execute

                if(isset($_GET['edit']) && $_GET['edit'] == "true")
                {
                

                    if(isset($_POST['graduationCompleted']) && $_POST['graduationCompleted']== "on")
                    {
                        $completed = 1;
                    }
                    else 
                    {
                        $completed = 0;
                    }
                    $collegeName = preg_replace('/[^\da-z ]/i', ' ', $collegeName);

                    // $sql = "UPDATE `graduation_details` SET `graduation_completed`='$completed',`college`='$collegeName',`start_year`='$startYear',`end year`='$endYear',`degree`='$degree',`stream`='$stream' WHERE user_email='$user_email'";
                    $sql = "UPDATE `graduation_details` SET `graduation_completed`= ?,`college`= ?,`start_year`= ?,`end year`= ?,`degree`= ?,`stream`= ? WHERE user_email= ?";
                    
                    if($stmt = mysqli_prepare($conn, $sql))
                    {
                        mysqli_stmt_bind_param($stmt,"sssssss",$completed, $collegeName, $startYear, $endYear, $degree, $stream, $user_email);
                        mysqli_stmt_execute($stmt);
                
                        $result = mysqli_stmt_get_result($stmt);
                        
        
                        
                        if(!$result)
                        {
                            header("Location: ../../../../strtup/user_resume_pages/user_resume_page3.php");
                            exit();
                        }
                        else{
                            header("Location: ../../../../strtup/user_resume_pages/user_resume_page3.php?errorOccured");
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
               
            header("Location: ../../../../strtup/user_resume_pages/user_resume_page3.php?userField=alreadySet");
        }
        else{







            if(isset($_POST['graduationCompleted']) && $_POST['graduationCompleted']== "on")
            {
                $completed = 1;
            }
            else 
            {
                $completed = 0;
            }
            $collegeName = preg_replace('/[^\da-z ]/i', ' ', $collegeName);
            
            // $sql = "INSERT INTO `graduation_details` (`user_email`, `graduation_completed`, `college`, `start_year`, `end year`, `degree`, `stream`) VALUES ('$user_email', '$completed', '$collegeName', '$startYear', '$endYear', '$degree', '$stream')";
            $sql = "INSERT INTO `graduation_details` (`user_email`, `graduation_completed`, `college`, `start_year`, `end year`, `degree`, `stream`) VALUES ( ?, ?, ?, ?, ?, ?, ?)";




            if($stmt = mysqli_prepare($conn, $sql))
            {
                mysqli_stmt_bind_param($stmt,"sssssss",$user_email, $completed, $collegeName, $startYear, $endYear, $degree, $stream);
                mysqli_stmt_execute($stmt);
        
                $result = mysqli_stmt_get_result($stmt);
                

                
                if(!$result)
                {
                    header("Location: ../../../../strtup/user_resume_pages/user_resume_page3.php");
                }
                else{
                    header("Location: ../../../../strtup/user_resume_pages/user_resume_page3.php?errorOccured");
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


?>