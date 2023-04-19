<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forget password</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <?php
        
         include "../db.php";
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
            
        require '../libs/PHPMailer/src/Exception.php';
        require '../libs/PHPMailer/src/PHPMailer.php';
        require '../libs/PHPMailer/src/SMTP.php';
            $errorMsg = "";
            if(isset($_POST["send"]))
            {   
                session_start();
                $email = $_POST["email"];
                $_SESSION['email']=$email;
                if(empty($email))
                {
                    $errorMsg = "Please enter your email.";
                }else
                {       $email = mysqli_real_escape_string($conn , $_POST['email']);
                        $sql = "SELECT * FROM users WHERE email = '$email'";
                        $result = mysqli_query($conn, $sql);
                        
                        if(mysqli_num_rows($result) > 0) 
                        {
                            $mail = new PHPMailer(true);
                           try {
                            $mail->SMTPDebug = 0;  
                            $mail->isSMTP();
                            $mail->Host='smtp.gmail.com';
                            $mail->Port=587;
                            $mail->SMTPAuth=true;
                            $mail->SMTPSecure='tls';
                            $mail->SMTPOptions = array(
                                'ssl' => array(
                                    'verify_peer' => false,
                                    'verify_peer_name' => false,
                                    'allow_self_signed' => true
                                )
                            );
                            $mail->Username='monmon.myotun@gmail.com';
                            $mail->Password='your password';
                            $mail->setFrom('monmon.myotun@gmail.com', 'Password Reset');
                            $mail->addAddress($email);
                            $mail->isHTML(true);
                            $mail->Subject="Recover your password";
                            $mail->Body="<b>Dear User</b>
                                    <h3>We received a request to reset your password.</h3>
                                    <p>Kindly click the below link to reset your password</p>
                                    http://localhost:8000/auth/reset_password.php
                                    <br><br>
                                    <p>With regrads,</p>
                                    <b>Programming</b>";
                                  
                            if($mail->send()) 
                            {
                                echo '<script>alert("Password reset link has been sent to your email.");</script>';
                            } else 
                            {
                                echo '<script>alert("Error: '.$mail->ErrorInfo.'");</script>';
                            }
                                    
                           } catch (Exception $e) {
                               echo $mail->ErrorInfo;
                           }
                        }
                    }
            }
        ?>

<section class="container">
        <div class="row space-top">
            <div class="col-lg-3 col-md-8 card-width mx-auto">
                <div class="card">
                    <div class="card-title">
                        <h3>Forget Password</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <label>Email</label>
                            <input type="email" placeholder="example@gmail.com" class="form-control" name="email">
                            <small class="text-danger"><?php echo $errorMsg; ?></small>
                    </div>
                    <div class="card-footer mt-3">
                        <a href="login.php" class="text-decoration-none">Login</a>
                            <button type="submit" class="btn btn-primary text-white float-end" name="send">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </main>
    
</body>
</html>