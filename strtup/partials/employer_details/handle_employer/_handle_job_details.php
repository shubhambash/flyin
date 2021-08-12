<?php

// handles the user input from post_a_job.php


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

    $sql = "SELECT name_of_organization FROM employer_basic_details WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        $organization_comp_name = $row['name_of_organization'];
    }
   
    // type of work
    if(isset($_POST['inlineRadioOptions']))
    {
        $jobType = $_POST['inlineRadioOptions'];
    }

    $jobTitle = $_POST['jobTitle'];
    $jobCategory = $_POST['jobCategory'];

    $workFromHome = 0;
    if(isset($_POST['workFromHome']) == 1)
    {
        $workFromHome = 1;
    }

    $location = $_POST['location'];
    $startDate = $_POST['startDate'];
    $duration = $_POST['duration'];

    $paid = 0;
    if(isset($_POST['paid']) == 1)
    {
        $paid = 1;
    }

    $negotiable = 0;
    if(isset($_POST['negotiable']) == 1)
    {
        $negotiable = 1;
    }

    if(isset($_POST['stipend']))
    {
        $stipend = $_POST['stipend'];
    }

    // skills required
    if(isset($_POST['skill1']))
    {
        $skill1 = $_POST['skill1'];
    }

    if(isset($_POST['skill2']))
    {
        $skill2 = $_POST['skill2'];
    }

    if(isset($_POST['skill3']))
    {
        $skill3 = $_POST['skill3'];
    }

    if(isset($_POST['skill4']))
    {
        $skill4 = $_POST['skill4'];
    }

    if(isset($_POST['skill5']))
    {
        $skill5 = $_POST['skill5'];
    }
    if(isset($_POST['skill6']))
    {
        $skill6 = $_POST['skill6'];
    }
    if(isset($_POST['skill7']))
    {
        $skill7 = $_POST['skill7'];
    }
    if(isset($_POST['skill8']))
    {
        $skill8 = $_POST['skill8'];
    }
    if(isset($_POST['skill9']))
    {
        $skill9 = $_POST['skill9'];
    }
    if(isset($_POST['skill10']))
    {
        $skill10 = $_POST['skill10'];
    }
    


    // eligibility

    if(isset($_POST['eligibility1']))
    {
        $eligibility1 = $_POST['eligibility1'];
    }


    if(isset($_POST['eligibility2']))
    {
        $eligibility2 = $_POST['eligibility2'];
    }

    

    if(isset($_POST['eligibility3']))
    {
        $eligibility3 = $_POST['eligibility3'];
    }

    

    if(isset($_POST['eligibility4']))
    {
        $eligibility4 = $_POST['eligibility4'];
    }

    

    if(isset($_POST['eligibility5']))
    {
        $eligibility5 = $_POST['eligibility5'];
    }

    $openings = $_POST['openings'];

    $jobDescription = $_POST['jobDescription'];

    


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
            header("Location: ../../../../strtup/user_resume_pages/user_resume_page3.php?userField=alreadySet");
        }
        else{

            
            $sql = "INSERT INTO `job_details` (`user_email`,`company_name`, `job_type`, `job_title`, `job_category`, `work_from_home`, `location`, `start_date`, `duration`, `paid`, `negotiable`, `stipend`, `skill1`, `skill2`, `skill3`, `skill4`, `skill5`, `skill6`, `skill7`, `skill8`, `skill9`, `skill10`, `eligibility1`, `eligibility2`, `eligibility3`, `eligibility4`, `eligibility5`, `openings`, `job_description`, `datetime`) VALUES ('$user_email','$organization_comp_name', '$jobType', '$jobTitle', '$jobCategory', '$workFromHome', '$location', '$startDate', '$duration', '$paid', '$negotiable', '$stipend', '$skill1 ', '$skill2', '$skill3', '$skill4', '$skill5', '$skill6', '$skill7', '$skill8', '$skill9', '$skill10', '$eligibility1', '$eligibility2', '$eligibility3', '$eligibility4', '$eligibility5', '$openings', '$jobDescription', current_timestamp())";
            $result1 = mysqli_query($conn,$sql);

            if($result1)
            {
                header("Location: ../../../../strtup/index2.php");
            }
            else 
            {
                echo 'didnt work';
            }
        }
    


    }



}


?>