<?php

    use PHPMailer\PHPMailer\PHPMailer;

$showError="false";
if($_SERVER['REQUEST_METHOD'] =="POST")
{
    include '_db-connection.php';
    $user_email= $_POST['signupEmail'];
    $user_password= $_POST['signupPassword'];
    $user_cpassword= $_POST['signupcPassword'];


    //using prepared stmt to avoid sql injection 

    $sql = "SELECT * FROM users WHERE user_email = ?";
    $numRows;

    if($stmt = mysqli_prepare($conn, $sql))
    {
        mysqli_stmt_bind_param($stmt,"s", $user_email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $numRows = mysqli_num_rows($result);

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
            


            $filledResume = 0;
            $hash = password_hash($user_password, PASSWORD_DEFAULT);
            $vkey = md5(time().$user_email);
            $isEmployer = 0;
            $sql = "INSERT INTO `users` (`user_email`, `is_employer`,`vkey`,`user_password`, `filled_resume`) VALUES (?, ?, ?, ?, ?)";

            if($stmt = mysqli_prepare($conn, $sql))
            {
                mysqli_stmt_bind_param($stmt, "sssss", $user_email, $isEmployer, $vkey, $hash, $filledResume);

                mysqli_stmt_execute($stmt);


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


            


                $mail->isHTML(true);
                $mail->setFrom("shubham9813773031@gmail.com", "sender");
                $mail->addAddress($user_email);
                $mail->Subject =  " Verify your Job Portal Account";
                echo 'upto here2';
                $mail->Body = "<strong><a href='http://localhost/strtup/partials/_verification.php?vkey=". $vkey ."&isEmployer=". $isEmployer ."'>Verify </a>your Job Portal Account</strong>";
    

           
                
                $test = $mail->send();


            
            
            $showAlert = true;

            echo 'upto here5   ';
           


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

            

               
        }
        else 
        {
            $showError ="PasswordNotMatched";
            

        }
    }

    header("Location: /strtup/index.php?signupsuccess=false&error=$showError");
    exit();


}
?>