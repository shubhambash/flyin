<?php


// handles the post request from _basicDetailsModal.php of the employer

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        
        include '../../_db-connection.php';

        session_start();
        if(!isset($_SESSION['useremail']))
        {
            header("Location: ../../login_signup_page.php?login=true");
        }
        $user_email = $_SESSION['useremail'];
        
        // post requests from the form
        $name_of_organization = $_POST['name'];
        $field_of_work = $_POST['field'];
        $address = $_POST['address'];
        $est_date = $_POST['estD'];
        $mobile_contact = $_POST['contact1'];
        $about = $_POST['about'];

        $website = NULL;
        $landline_contact = NULL;
        $socialHandle1 = NULL;
        $socialHandle2 = NULL;
        $socialHandle3 = NULL;

        if(isset($_POST['contact2']))
        {
            $landline_contact = $_POST['contact2'];

        }
        if(isset($_POST['website']))
        {
           $website = $_POST['website'];
        }
        if(isset($_POST['socialHandle1']))
        {
            $socialHandle1 = $_POST['socialHandle1'];
        }

        if(isset($_POST['socialHandle2']))
        {
            $socialHandle2 = $_POST['socialHandle2'];
        }

        if(isset($_POST['socialHandle3']))
        {
            $socialHandle3 = $_POST['socialHandle3'];
        }



        
        $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
        $existUser = "SELECT * FROM `employer_basic_details` WHERE user_email='$user_email'";


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
                header("Location: ../../../index2.php?userName=alreadySet");
            }

            else{


                $checkContactsql = "SELECT * FROM `employer_basic_details` WHERE mobile_contact=$mobile_contact";
                $resultContactsql = mysqli_query($conn, $checkContactsql);

                if($resultContactsql)
                {
                    $numContacts = mysqli_num_rows($resultContactsql);

                    if($numContacts >= 1)
                    {
                        header("Location: ../../../index2.php?userContact=alreadyUsed");
                        exit();
                    }
                }

            

                    $sql =  "INSERT INTO `employer_basic_details`(`user_email`, `name_of_organization`, `field_of_work`, `about`,`address`, `est_date`, `mobile_contact`, `website`, `social_handle1`, `social_handle2`, `social_handle3`, `landline_contact`) VALUES ('$user_email','$name_of_organization','$field_of_work', '$about' , '$address','$est_date','$mobile_contact','$website','$socialHandle1','$socialHandle2','$socialHandle3','$landline_contact')";
                    $result = mysqli_query($conn,$sql);

           if($result)
           {
                $sql = "UPDATE users SET filled_resume=1 WHERE user_email='$user_email'";
                $result = mysqli_query($conn, $sql);
                header("Location: ../../../index2.php");
           }
            }
        }

    }
    else 
    {
        echo "not post method";
    }
   
?>