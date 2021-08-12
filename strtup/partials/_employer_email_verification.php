<?php


    if(isset($_GET['vkey']))
    {   
       
        include '_db-connection.php';

        $vkey = $_GET['vkey'];

        $sql = "SELECT vkey,verified FROM `employers` WHERE verified=0 AND vkey='$vkey'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1)
        {
            $sql = "UPDATE employers SET verified=1 WHERE vkey='$vkey'";
            $result = mysqli_query($conn, $sql);
            
            if($result)
            {
                echo 'Account verified';
                header("Location: /strtup/index.php?accountVerified=1");
            }
            else{
                die('something went wrong');
            }
        }
        else 
        {
            die('This account is either already verified or does not exist');
        }
    }
    else
    {
        die('Something went wrong with this page');
    }



?>