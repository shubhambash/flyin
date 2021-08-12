<?php


// handles the post request from user_resume_page5.php

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        
        include '../../_db-connection.php';

        session_start();
        if(!isset($_SESSION['useremail']))
        {
            header("Location: ../../login_signup_page.php?login=true");
        }
        $user_email = $_SESSION['useremail'];

        if(isset($_POST['skill1']))
        {
            $skill1 = $_POST['skill1'];
            
        }
        else
        {
            $skill1 = "";
        }

        if(isset($_POST['skill2']))
        {
            $skill2 = $_POST['skill2'];
        }
        else
        {
            $skill2 = "";
        }

        if(isset($_POST['skill3']))
        {
            $skill3 = $_POST['skill3'];
        }
        else
        {
            $skill3 = "";
        }

        if(isset($_POST['skill4']))
        {
            $skill4 = $_POST['skill4'];
        }
        else
        {
            $skill4 = "";
        }

        if(isset($_POST['skill5']))
        {
            $skill5 = $_POST['skill5'];
        }
        else
        {
            $skill5 = "";
        }

        if(isset($_POST['skill6']))
        {
            $skill6 = $_POST['skill6'];
        }
        else
        {
            $skill6 = "";
        }

        if(isset($_POST['skill7']))
        {
            $skill7 = $_POST['skill7'];
        }
        else
        {
            $skill7 = "";
        }


        if(isset($_POST['skill8']))
        {
            $skill8 = $_POST['skill8'];
        }
        else
        {
            $skill8 = "";
        }



        if(isset($_POST['skill9']))
        {
            $skill9 = $_POST['skill9'];
        }
        else
        {
            $skill9 = "";
        }


        if(isset($_POST['skill10']))
        {
            $skill10 = $_POST['skill10'];
        }
        else
        {
            $skill10 = "";
        }
        
        echo $user_email;


        
        $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
        $existUser = "SELECT * FROM `skills_details` WHERE user_email='$user_email'";


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

                if(isset($_GET['edit']) && $_GET['edit'] == "true")
                {
    
    
                    //$sql = "UPDATE `pr_experience_details` SET `title1`= ?,`company_name1`= ?,`title2`= ?,`company_name2`= ?, `title3`= ?, `company_name3` = ? WHERE user_email=? ";
                     $sql = "UPDATE `skills_details` SET `skill1`=?,`skill2`=?,`skill3`=?,`skill4`=?,`skill5`=?,`skill6`=?,`skill7`=?,`skill8`=?,`skill9`=?,`skill10`=? WHERE user_email = ?";
                     if($stmt = mysqli_prepare($conn, $sql))
                     {
                        mysqli_stmt_bind_param($stmt,"sssssssssss",  $skill1, $skill2, $skill3, $skill4, $skill5, $skill6, $skill7, $skill8, $skill9, $skill10, $user_email);

                        mysqli_stmt_execute($stmt);
                 
                         $result = mysqli_stmt_get_result($stmt);
                         
         
                         mysqli_stmt_close($stmt);
                         if(!$result)
                         {
                             header("Location: ../../../../strtup/user_resume_pages/user_resume_page5.php?success=true");
                             exit();
                         }
                         else{
                             header("Location: ../../../../strtup/user_resume_pages/user_resume_page5.php?errorOccured");
                             exit();
                         }
         
                 
         
                     
         
                    
                 
                         
                 
                     } 
                     else
                     {
                         echo "Some error occured";
                         exit();
                     }





                }
                header("Location: ../../../user_resume_pages/user_resume_page5.php?userField=alreadySet");
                exit();
            }
            else
            {

           


            echo "here";

            $sql =  "INSERT INTO `skills_details` (`user_email`, `skill1`, `skill2`, `skill3`, `skill4`, `skill5`, `skill6`, `skill7`, `skill8`, `skill9`, `skill10`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            
            echo "here";


                    if($stmt = mysqli_prepare($conn, $sql))
                     {
                        mysqli_stmt_bind_param($stmt,"sssssssssss",$user_email,  $skill1, $skill2, $skill3, $skill4, $skill5, $skill6, $skill7, $skill8, $skill9, $skill10);

                        mysqli_stmt_execute($stmt);
                 
                         $result = mysqli_stmt_get_result($stmt);
                         
                        //useful for debugging \/
                        //  printf("Error: %s.\n", mysqli_stmt_error($stmt));

         
                        mysqli_stmt_close($stmt);
                         if(!$result)
                         {
                             header("Location: ../../../../strtup/user_resume_pages/user_resume_page5.php?success=true");
                             exit();
                         }
                         else{
                             header("Location: ../../../../strtup/user_resume_pages/user_resume_page5.php?errorOccured");
                             exit();
                         }
         
                 
         
                     
         
                    
                 
                         
                 
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