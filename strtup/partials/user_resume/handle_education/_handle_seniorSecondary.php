<?php

// handles the user input from _seniorSecondaryModal.php


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
   
    $schoolName = $_POST['schoolName'];
    $completionYear = $_POST['completionYear'];
    $board = $_POST['board'];
    $scale = $_POST['performanceScale'];
    $obtained = $_POST['obtained'];
    $stream = $_POST['stream'];


    $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";


    $existUser = "SELECT * FROM `senior_secondary_details` WHERE user_email='$user_email'";

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
                           
           
                               if(isset($_POST['plustwoCompleted']) && $_POST['plustwoCompleted']== "on")
                               {
                                   $completed = 1;
                               }
                               else 
                               {
                                   $completed = 0;
                               }
                            if($scale == 1)
                                {
                                    $scale = "Percentage";
                                }
                                else if($scale == 2)
                                {
                                    $scale = "GPA";
                                }
                                else if($scale == 3)
                                {
                                    $scale = "CGPA";
                                }
                                else if($scale == 3)
                                {
                                    $scale = "Grade";
                                }


                            if($stream == "2")
                                {
                                    $stream = "Management";

                                }
                                else if($stream == "1")
                                {
                                    $stream = "Science";
                                }
                                else if($stream == "3")
                                {
                                    $stream = "Humanities";
                                }
                               $schoolName = preg_replace('/[^\da-z ]/i', ' ', $schoolName);
           
                               $sql = "UPDATE `senior_secondary_details` SET `completed_plus2`= ?,`school_name`= ?,`completion_year`= ?,`board`= ? ,`stream`= ?,`performance_scale`= ?,`obtained`= ? WHERE user_email= ?";
                               



                                if($stmt = mysqli_prepare($conn, $sql))
                                {
                                    mysqli_stmt_bind_param($stmt,"ssssssss",$completed, $schoolName, $completionYear, $board, $stream, $scale,$obtained, $user_email);
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

            if(isset($_POST['plustwoCompleted']) && $_POST['plustwoCompleted']== "on")
            {
                $completed = 1;
            }
            else 
            {
                $completed = 0;
            }

            if($scale == 1)
            {
                $scale = "Percentage";
            }
            else if($scale == 2)
            {
                $scale = "GPA";
            }
            else if($scale == 3)
            {
                $scale = "CGPA";
            }
            else if($scale == 3)
            {
                $scale = "Grade";
            }


            if($stream == "2")
            {
                $stream = "Management";

            }
            else if($stream == "1")
            {
                $stream = "Science";
            }
            else if($stream == "3")
            {
                $stream = "Humanities";
            }

            $schoolName = preg_replace('/[^\da-z ]/i', ' ', $schoolName);
          
            
            $sql = "INSERT INTO `senior_secondary_details` (`user_email`, `completed_plus2`, `school_name`, `completion_year`, `board`, `stream`, `performance_scale`, `obtained`) VALUES (?,?,?,?,?,?,?,?)";
            
            if($stmt = mysqli_prepare($conn, $sql))
            {
                mysqli_stmt_bind_param($stmt,"ssssssss",$user_email, $completed, $schoolName, $completionYear, $board, $stream, $scale, $obtained);
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
        
                exit();
        
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