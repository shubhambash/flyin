<?php

// handles the user input from _projectDetails.php

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
   
    

    if(isset($_POST['title1']) && isset($_POST['description1']) && isset($_POST['link1']))
    {
        $title1 = $_POST['title1'];
        $description1 = $_POST['description1'];
        $link1 = $_POST['link1'];
    }
    else 
    {
        $title1 = NULL;
        $description1 = NULL;
        $link1 = NULL;
    }


    if(isset($_POST['title2']) && isset($_POST['description2']) && isset($_POST['link2']))
    {
        $title2 = $_POST['title2'];
        $description2 = $_POST['description2'];
        $link2 = $_POST['link2'];
    }
    else 
    {
        $title2 = NULL;
        $description2 = NULL;
        $link2 = NULL;
    }


    if(isset($_POST['title3']) && isset($_POST['description3']) && isset($_POST['link3']))
    {
        $title3 = $_POST['title3'];
        $description3 = $_POST['description3'];
        $link3 = $_POST['link3'];
    }
    else 
    {
        $title3 = NULL;
        $description3 = NULL;
        $link3 = NULL;
    }


    if(isset($_POST['title4']) && isset($_POST['description4']) && isset($_POST['link4']))
    {
        $title4 = $_POST['title4'];
        $description4= $_POST['description4'];
        $link4 = $_POST['link4'];
    }
    else 
    {
        $title4 = NULL;
        $description4 = NULL;
        $link4 = NULL;
    }


    if(isset($_POST['title5']) && isset($_POST['description5']) && isset($_POST['link5']))
    {
        $title5 = $_POST['title5'];
        $description5 = $_POST['description5'];
        $link5 = $_POST['link5'];
    }
    else 
    {
        $title5 = NULL;
        $description5 = NULL;
        $link5 = NULL;
    }



    if(isset($_POST['title6']) && isset($_POST['description6']) && isset($_POST['link6']))
    {
        $title6 = $_POST['title6'];
        $description6 = $_POST['description6'];
        $link6 = $_POST['link6'];
    }
    else 
    {
        $title6 = NULL;
        $description6 = NULL;
        $link6 = NULL;
    }



    if(isset($_POST['title7']) && isset($_POST['description7']) && isset($_POST['link7']))
    {
        $title7 = $_POST['title7'];
        $description7 = $_POST['description7'];
        $link7 = $_POST['link7'];
    }
    else 
    {
        $title7 = NULL;
        $description7 = NULL;
        $link7 = NULL;
    }





    $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";


    $existUser = "SELECT * FROM `project_details` WHERE user_email='$user_email'";

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


                //$sql = "UPDATE `pr_experience_details` SET `title1`= ?,`company_name1`= ?,`title2`= ?,`company_name2`= ?, `title3`= ?, `company_name3` = ? WHERE user_email=? ";
                 $sql = "  UPDATE `project_details` SET `title1`=?,`description1`=?,`link1`=?,`title2`=?,`description2`=?,`link2`=?,`title3`=?,`description3`=?,`link3`=?,`title4`=?,`description4`=?,`link4`=?,`title5`=?,`description5`=?,`link5`=?,`title6`=?,`description6`=?,`link6`=?,`title7`=?,`description7`=?,`link7`=? WHERE user_email = ?";
                if($stmt = mysqli_prepare($conn, $sql))
                {
                    mysqli_stmt_bind_param($stmt,"ssssssssssssssssssssss",  $title1, $description1, $link1, $title2, $description2, $link2, $title3, $description3, $link3, $title4, $description4, $link4, $title5, $description5, $link5, $title6, $description6, $link6, $title7, $description7, $link7, $user_email);
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


           // $sql = "INSERT INTO `pr_experience_details` (`user_email`, `title1`, `company_name1`, `title2`, `company_name2`, `title3`, `company_name3`) VALUES (?,?,?,?,?,?,?)";
            $sql = "INSERT INTO `project_details`(`user_email`, `title1`, `description1`, `link1`, `title2`, `description2`, `link2`, `title3`, `description3`, `link3`, `title4`, `description4`, `link4`, `title5`, `description5`, `link5`, `title6`, `description6`, `link6`, `title7`, `description7`, `link7`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";


            
            
            if($stmt = mysqli_prepare($conn, $sql))
            {
                mysqli_stmt_bind_param($stmt,"ssssssssssssssssssssss", $user_email, $title1, $description1, $link1, $title2, $description2, $link2, $title3, $description3, $link3, $title4, $description4, $link4, $title5, $description5, $link5, $title6, $description6, $link6, $title7, $description7, $link7);
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