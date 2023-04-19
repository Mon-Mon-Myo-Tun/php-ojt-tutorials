<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
    <?php
        include "../db.php";
        
        $errorMsg="";
        if (isset($_POST['login'])) 
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();  
            $result = $stmt->get_result();
            if (empty($name) || empty($email) || empty($phone) || empty($password) || empty($address))
            {
                    $errorMsg = "Please fill in all fields";
            }
            if ($result->num_rows == 1) 
            {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) 
                {
                    session_start();
                    $_SESSION['user_id'] = $row['id'];
                     $_SESSION['name'] = $row['name'];
                   
                    header('Location:../index.php');
                   
                } else 
                {
                    $errorMsg= "Incorrect email or password"; 
                }
            } 
            
        }
    ?>

        <section class=" container">
            <div class="row pt-5">
                <div class="col-lg-3 col-md-8 card-width mx-auto">
                    <div class="card ">
                        <div class="card-title">
                        <h3>Login</h3>
                        </div>
                        <div class="card-body">
                            <form  method="post" >
                        
                            <label>Email</label>
                            <input type="email" placeholder="example@gmail.com" class="form-control" name="email">
                            
                            <label>Password</label>
                            <input type="password" placeholder="Enter Password" class="form-control" name="password">
                            <p><a href="forget_password.php" class="text-decoration-none small">forget password?</a></p><br>
                            <small class="text-danger"><?php  echo $errorMsg; ?></small>
                            <button type="submit" class="btn btn-primary text-white mt-3 btn-width"  name="login">Login</button>
                            <p class=" text-center small">Not a member? &nbsp;<a href="register.php" class="text-decoration-none " >Sign up</a></p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
    
</body>
</html>