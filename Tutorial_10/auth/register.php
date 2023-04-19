<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <main>
        <?php
            include "../db.php";
        
            $message = "";
            $paswMessage = "";
            $phoneMessage="";

            function isStrongPassword($password)
            {
                $uppercase = false;
                $lowercase = false;
                $special = false;
                $number = false;

                if (preg_match('/[A-Z]/', $password)) {
                    $uppercase = true;
                }
                if (preg_match('/[a-z]/', $password)) {
                    $lowercase = true;
                }
                if (preg_match('/[0-9]/', $password)) {
                    $number = true;
                }
                if (preg_match('/[!@#$&^%*]/', $password)) {
                    $special = true;
                }

                if ($number && $uppercase && $lowercase && $special ) {
                    return true;
                } else {
                    return false;
                }
            }

            if (isset($_POST['register'])) 
            {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];
                $address = $_POST['address'];
            
                if (empty($name) || empty($email) && empty($phone) || empty($password) || empty($address)) {
                    $message = "Please fill in all fields";
                }
            
                if (!empty($password) && !isStrongPassword($password)) {
                    $paswMessage = "Weak Password (eg- Mm@123 contain A-Z, 0-9, a-z, !@#$)";
                }
            
                if (!empty($phone) && !preg_match('/^(053[0-9]{5}|09[0-9]{9}|09[0-9]{8})$/', $phone)) {
                    $phoneMessage = "Please enter a valid phone number";
                }
                if (!$message && !$paswMessage && !$phoneMessage) {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone, address) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssss", $name, $email, $hashed_password, $phone, $address);
                    $result = $stmt->execute();
                    
                    if (!$result) {
                        printf("Error: %s\n", mysqli_error($conn));
                        exit();
                    }
            
                    if ($result) {
                        header('Location: login.php');
                        exit;
                    }
                }
            }
            
        ?>

        <section class="container">
            <div class="row pt-5">
                <div class="col-lg-3 col-md-8 card-width mx-auto">
                    <div class="card ">
                        <div class="card-title">
                        <h3> Register</h3>
                        </div>
                        <div class="card-body">
                            <form  method="post" >
                            <label>Name</label>
                            <input type="text" placeholder="Enter your name" class="form-control" name="name">
                            <label>Email</label>
                            <input type="email" placeholder="example@gmail.com" class="form-control" name="email" >
                            <label>Phone</label>
                            <input type="text" placeholder="09*********" class="form-control" name="phone" >
                            <small class="text-danger"><?php  echo $phoneMessage; ?></small><br>
                            <label>Password</label>
                            <input type="password" placeholder="Enter Password" class="form-control" name="password" >
                            <small class="text-danger"><?php  echo $paswMessage; ?></small><br>
                            <label>Address</label>
                            <input type="text" placeholder="Enter your address"  class="form-control"  name="address" >
                            <small class="text-danger"><?php  echo $message; ?></small>
                            <button type="submit" class="btn btn-primary text-white mt-3 btn-width" name="register">Register</button>
                            <p class=" text-center"><a href="login.php" class="text-decoration-none small">Already have an account?</a></p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
   
</body>
</html>
