<?php

// handles the user input from _diplomaModal.php


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
   
    $institute = $_POST['InstituteName'];
    $startYear = $_POST['startYear'];
    $endYear = $_POST['endYear'];
    $field = $_POST['field'];
    $stream = $_POST['stream'];


    $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";


    $existUser = "SELECT * FROM `diploma_details` WHERE user_email='$user_email'";

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

            
            if(isset($_GET['edit']) && $_GET['edit'] == "true")
            {


                if(isset($_POST['diplomaCompleted']) && $_POST['diplomaCompleted']== "on")
                {
                    $completed = 1;
                }
                else 
                {
                    $completed = 0;
                }

                $institute = preg_replace('/[^\da-z ]/i', ' ', $institute);
               // $sql = "INSERT INTO `diploma_details` (`user_email`, `completed_diploma`, `institute_name`, `start_year`, `end_year`, `field`, `stream`) VALUES ('$user_email', '$completed', '$institute', '$startYear', '$endYear', '$field', '$stream', current_timestamp())";
                
                $sql = "UPDATE `diploma_details` SET `completed_diploma`= ?,`institute_name`= ?,`start_year`= ?,`end_year`= ?,`field`= ?,`stream`= ? WHERE user_email= ? ";

                




                if($stmt = mysqli_prepare($conn, $sql))
                {
                    mysqli_stmt_bind_param($stmt,"sssssss",$completed, $institute, $startYear, $endYear,$field,$stream, $user_email);
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

            if(isset($_POST['diplomaCompleted']) && $_POST['diplomaCompleted']== "on")
            {
                $completed = 1;
            }
            else 
            {
                $completed = 0;
            }
            $institute = preg_replace('/[^\da-z ]/i', ' ', $institute);
            $sql = "INSERT INTO `diploma_details` (`user_email`, `completed_diploma`, `institute_name`, `start_year`, `end_year`, `field`, `stream`) VALUES (?,?,?,?,?,?,?)";
            
            
            if($stmt = mysqli_prepare($conn, $sql))
            {
                mysqli_stmt_bind_param($stmt,"sssssss",$user_email, $completed, $institute, $startYear, $endYear, $field, $stream);
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
    


    }



}


?>