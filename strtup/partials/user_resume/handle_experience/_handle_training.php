<?php

// handles the user input from __rainingDetailsModal.php

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
   
    

    if(isset($_POST['title1']) && isset($_POST['organization1']))
    {
        $title1 = $_POST['title1'];
        $companyName1 = $_POST['organization1'];
        $start_date1 = $_POST['startDate1'];
        $end_date1 = $_POST['endDate1'];
        $description1 = $_POST['description1'];
    }
    else 
    {
        $title1 = NULL;
        $companyName1 = NULL;
        $start_date1 = NULL;
        $end_date1 = NULL;
        $description1 = NULL;
    }




    if(isset($_POST['title2']) && isset($_POST['organization2']))
    {
        $title2 = $_POST['title2'];
        $companyName2 = $_POST['organization2'];
        $start_date1 = $_POST['startDate2'];
        $end_date2 = $_POST['endDate2'];
        $description2 = $_POST['description2'];
    }
    else 
    {
        $title2 = NULL;
        $companyName2 = NULL;
        $start_date2 = NULL;
        $end_date2 = NULL;
        $description2 = NULL;
    }


    if(isset($_POST['title3']) && isset($_POST['organization3']))
    {
        $title3 = $_POST['title3'];
        $companyName3 = $_POST['organization3'];
        $start_date3 = $_POST['startDate3'];
        $end_date3 = $_POST['endDate3'];
        $description3 = $_POST['description3'];
    }
    else 
    {
        $title3 = NULL;
        $companyName3 = NULL;
        $start_date3 = NULL;
        $end_date3 = NULL;
        $description3 = NULL;
    }



    if(isset($_POST['title4']) && isset($_POST['organization4']))
    {
        $title4 = $_POST['title4'];
        $companyName4 = $_POST['organization4'];
        $start_date4 = $_POST['startDate4'];
        $end_date4 = $_POST['endDate4'];
        $description4 = $_POST['description4'];
    }
    else 
    {
        $title4 = NULL;
        $companyName4 = NULL;
        $start_date4 = NULL;
        $end_date4 = NULL;
        $description4 = NULL;
    }





    $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";


    $existUser = "SELECT * FROM `trainings_details` WHERE user_email='$user_email'";

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

                $sql = "UPDATE `trainings_details` SET `training_title1` = ?, `training_organization1` = ?, `start_date1` = ?, `end_date1` = ?, `training_description1` = ?, `training_title2` = ?, `training_organization2` = ?, `start_date2` = ?, `end_date2` = ?, `training_description2` = ?, `training_title3` = ?, `training_organization3` = ?, `start_date3` = ?, `end_date3` = ?, `training_description3` = ?, `training_title4` = ?, `training_organization4` = ?, `start_date4` = ?, `end_date4` = ?, `training_description4` = ? WHERE `user_email` = ?";

                if($stmt = mysqli_prepare($conn, $sql))
                {
                    mysqli_stmt_bind_param($stmt,"sssssssssssssssssssss", $title1, $companyName1, $start_date1, $end_date1, $description1, $title2, $companyName2, $start_date2, $end_date2, $description2, $title3, $companyName3, $start_date3, $end_date3, $description3, $title4, $companyName4, $start_date4, $end_date4, $description4, $user_email);
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


            $sql = "INSERT INTO `trainings_details`(`user_email`, `training_title1`, `training_organization1`, `start_date1`, `end_date1`, `training_description1`, `training_title2`, `training_organization2`, `start_date2`, `end_date2`, `training_description2`, `training_title3`, `training_organization3`, `start_date3`, `end_date3`, `training_description3`, `training_title4`, `training_organization4`, `start_date4`, `end_date4`, `training_description4`) VALUES (?, ? ,?, ?, ?, ?, ?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            


            if($stmt = mysqli_prepare($conn, $sql))
            {
                mysqli_stmt_bind_param($stmt,"sssssssssssssssssssss",  $user_email, $title1, $companyName1, $start_date1, $end_date1, $description1, $title2, $companyName2, $start_date2, $end_date2, $description2, $title3, $companyName3, $start_date3, $end_date3, $description3, $title4, $companyName4, $start_date4, $end_date4, $description4);
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
    


    }



}
else{
    echo '<h1>404</h1>error';
}


?>