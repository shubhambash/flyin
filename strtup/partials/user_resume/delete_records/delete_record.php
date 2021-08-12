<?php


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        session_start();
        
        if(isset($_GET['tableName']))
        {
            include '../../_db-connection.php';
            $tableName = $_GET['tableName'];
            $user_email = $_SESSION['useremail'];

            $sql = "DELETE FROM `$tableName` WHERE user_email='$user_email'";
            $result = mysqli_query($conn, $sql);

            if($result)
            {
                echo 'deleting record';
                header("Location:../../../user_resume_pages/user_resume_final.php?recordDeleted=true");
                exit();
            }
            else
            {
                header("Location:../../../user_resume_pages/user_resume_final.php?error=problemOccured");
                exit();
            }

            
        }
        else 
        {
            header("Location:../../../user_resume_pages/user_resume_final.php?error=problemOccured");
        }
    }


?>