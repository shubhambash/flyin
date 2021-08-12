<?php

    use PHPMailer\PHPMailer\PHPMailer;

$showError="false";
if($_SERVER['REQUEST_METHOD'] =="POST")
{
  
    include '_db-connection.php';
    $user_email= $_POST['signupEmail'];
    $user_password= $_POST['signupPassword'];
    $user_cpassword= $_POST['signupcPassword'];
    $contact = $_POST['contact'];


    //using prepared statement to prevent sql injection


    $sql = "SELECT * FROM users WHERE user_email = ?";
    $numRows;

    if($stmt = mysqli_prepare($conn, $sql))
    {
        mysqli_stmt_bind_param($stmt,"s", $user_email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $numRows = mysqli_num_rows($result);

    }
    else
    {
        exit();
    }



    // check if email exists

    

    if($numRows > 0)
    {
        $showError = "UserAlreadyExists";

      
    }
    else
    {
        if($user_password == $user_cpassword)
        {
            echo 'password condition passed';
            


           
            $hash = password_hash($user_password, PASSWORD_DEFAULT);
            $vkey = md5(time().$user_email);
            $filled = 0;
            $isEmployer = 1;





           //'$user_email','$isEmployer' ,'$vkey','$hash','$filled'

            $sql = "INSERT INTO `users`(`user_email`, `is_employer`,`vkey`, `user_password`, `filled_resume`) VALUES (?,?,?,?,?)";
            if($stmt = mysqli_prepare($conn, $sql))
            {
                mysqli_stmt_bind_param($stmt, "sssss", $user_email, $isEmployer, $vkey, $hash, $filled);

                mysqli_stmt_execute($stmt);

                

                
                    //  successfully added to DB 
                    //  now send an email for verification


                    echo 'result true';
                    require_once "PHPMailer/PHPMailer.php";
                    require_once "PHPMailer/SMTP.php";
                    require_once "PHPMailer/Exception.php";
        
                    $mail = new PHPMailer();

                    
        
                    $mail->isSMTP();
                    $mail->SMTPDebug = 2;
                    $mail->Debugoutput = 'html';
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->Username = "shubham9813773031@gmail.com";
                    $mail->Password = "Kathmandu@55";
                    $mail->Port = 465;
                    $mail->SMTPSecure = "ssl";


                    echo 'upto here';


                    $mail->isHTML(true);
                    $mail->setFrom("shubham9813773031@gmail.com", "sender");
                    $mail->addAddress($user_email);
                    $mail->Subject =  "Verify your Job Portal Account";
                    echo 'upto here2';
                    $mail->Body = "<strong><a href='http://localhost/strtup/partials/_verification.php?vkey=". $vkey ."&isEmployer=". $isEmployer ."'>Verify </a>your Job Portal Account</strong>";
        

                    echo 'upto here3';
                    
                    $test = $mail->send();



                    echo 'upto here4';
                
                
                $showAlert = true;

                echo 'upto here5   ';
                echo var_dump($mail->send());


                mysqli_stmt_close($stmt);


                if($test)
                {
                    echo '
                    <script>
     
                    window.location = "verify.php";
     
                    </script>
     
                    ';
                }
            
                exit();
                





            }
            else
            {
                echo 'Invalid. Please re-enter';
                exit();
            }




            

                    

    
        }
        else 
        {
            
            $showError ="PasswordNotMatched";
            

        }
    }

    header("Location: /strtup/index.php?result=". $numRows ."signupsuccess=false&error=$showError");
    exit();


}




?>