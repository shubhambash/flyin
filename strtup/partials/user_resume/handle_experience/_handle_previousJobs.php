<?php

// handles the user input from _previousJobsModal.php

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
   
    $noOfJobs = $_POST['numberOfJobs'];

    if(isset($_POST['title1']) && isset($_POST['companyName1']))
    {
        $title1 = $_POST['title1'];
        $companyName1 = $_POST['companyName1'];
    }
    else 
    {
        $title1 = NULL;
        $companyName1 = NULL;
    }


    if(isset($_POST['title2']) && isset($_POST['companyName2']))
    {
        $title2 = $_POST['title2'];
        $companyName2 = $_POST['companyName2'];
    }
    else 
    {
        $title2 = NULL;
        $companyName2 = NULL;
    }


    if(isset($_POST['title3']) && isset($_POST['companyName3']))
    {
        $title3 = $_POST['title3'];
        $companyName3 = $_POST['companyName3'];
    }
    else 
    {
        $title3 = NULL;
        $companyName3 = NULL;
    }




    $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";


    $existUser = "SELECT * FROM `job_experience_details` WHERE user_email='$user_email'";

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

                $sql = "UPDATE `job_experience_details` SET `no_of_previous_jobs`= ?,`title1`= ?,`company_name1`= ?,`title2`= ?,`company_name2`= ?,`title3`= ?, `company_name3` = ? WHERE user_email=? ";

                if($stmt = mysqli_prepare($conn, $sql))
                {
                    mysqli_stmt_bind_param($stmt,"ssssssss",$noOfJobs, $title1, $companyName1, $title2, $companyName2, $title3, $companyName3, $user_email);
                    mysqli_stmt_execute($stmt);
            
                    $result = mysqli_stmt_get_result($stmt);
                    
    
                    
                    if(!$result)
                    {
                        header("Location: ../../../../strtup/user_resume_pages/user_resume_page4.php");
                        exit();
                    }
                    else{
                        header("Location: ../../../../strtup/user_resume_pages/user_resume_page4.php?errorOccured");
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

            header("Location: ../../../../strtup/user_resume_pages/user_resume_page4.php?userField=alreadySet");
        }
        else{


            
            $sql = "INSERT INTO `job_experience_details` (`user_email`, `no_of_previous_jobs`, `title1`, `company_name1`, `title2`, `company_name2`, `title3`, `company_name3`) VALUES (?,?,?,?,?,?,?,?)";
            

            if($stmt = mysqli_prepare($conn, $sql))
            {
                mysqli_stmt_bind_param($stmt,"ssssssss",$user_email, $noOfJobs, $title1, $companyName1, $title2, $companyName2, $title3, $companyName3);
                mysqli_stmt_execute($stmt);
        
                $result = mysqli_stmt_get_result($stmt);
                

                
                if(!$result)
                {
                    header("Location: ../../../../strtup/user_resume_pages/user_resume_page4.php");
                }
                else{
                    header("Location: ../../../../strtup/user_resume_pages/user_resume_page4.php?errorOccured");
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
else{
    echo '<h1>404</h1>error';
}


?>