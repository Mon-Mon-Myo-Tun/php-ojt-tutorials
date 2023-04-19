<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset password</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/script.js"></script>
</head>
<body>
    <main>
    <?php
        include "../db.php";
        $errorMsg="";
        session_start();
        $forgetEmail = isset($_SESSION['email']) ? $_SESSION['email'] : ' ';
        $paswMessage ="";
        $success ="";

        function isStrongPassword($newPassword)
        {
            $uppercase = false;
            $lowercase = false;
            $special = false;
            $number = false;
            if (preg_match('/[A-Z]/', $newPassword)) {
                $uppercase = true;
            }
            if (preg_match('/[a-z]/', $newPassword)) {
                $lowercase = true;
            }
            if (preg_match('/[0-9]/', $newPassword)) {
                $number = true;
            }
            if (preg_match('/[!@#$&^%*]/',$newPassword)) {
                $special = true;
            }

            if ($number && $uppercase && $lowercase && $special ) {
                return true;
            } else {
                return false;
            }
        }

        if (isset($_POST['confirm']))
        {
            $email = $_POST['email'];
            $newPassword=$_POST['newPassword'];
            $confirmPassword=$_POST['confirmPassword'];
            if(empty($_POST['email']) || empty($_POST['newPassword']) || empty($_POST['confirmPassword'])) 
            {
                $errorMsg ="Need to fill all field";
            }   
            if (!empty($newPassword) && !isStrongPassword($newPassword))
            {
                    $paswMessage = "Weak Password (eg- Mm@123 contain A-Z, 0-9, a-z, !@#$)";
            }
            if (($newPassword != $confirmPassword) && !empty($confirmPassword) ) 
            {
                $errorMsg = "Passwords do not match";
            }
            
            if(empty($errorMsg)){

                if ($newPassword == $confirmPassword && isStrongPassword($newPassword)) {
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
                    $stmt->bind_param("ss", $hashedPassword, $email);
                    $stmt->execute();
                    $stmt->close();
                    header('Location:login.php');
                }
            }
        }      
    ?>

<section class="container">
    <div class="row space">
        <div class="col-lg-3 col-md-8 card-width mx-auto">
            <div class="card">
                <div class="card-title">
                    <h3>Reset Password</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        <label>Email</label>
                        <input type="email" placeholder="example@gmail.com" class="form-control mb-2" name="email" value="<?php echo $forgetEmail ?>">
                        <label>New Password</label>
                        <input type="password" placeholder="Enter your new password" class="form-control  mb-2" name="newPassword">
                        <small class="text-danger"><?php echo $paswMessage ; ?></small>
                        <label>Confirm Password</label>
                        <input type="password" placeholder="Enter your confirm password" class="form-control" name="confirmPassword">
                        <small class="text-danger"><?php echo $errorMsg; ?></small>
                        
                </div>
                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary text-white float-end" name="confirm">
                        <span class="text-decoration-none text-white">Confirm</span>
                    </button>
                </div>
                </form>
            </div>

        </div>
    </div>
</section>

    
</body>
</html>