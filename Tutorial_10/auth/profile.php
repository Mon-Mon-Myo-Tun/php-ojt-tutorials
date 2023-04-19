<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php
    include '../db.php';
    session_start();
    $userID= $_SESSION['user_id'];
    $user_query = "SELECT * FROM users WHERE id={$userID}";
    $user_result = mysqli_query($conn, $user_query);
    $user = mysqli_fetch_assoc($user_result);
    $errorName= $errorEmail=$errorUserprofile= "";
    $errorEmailExist=" ";
    $targetDir = "../images/";
    $name = "";
    $email = "";
    if (isset($_POST['update'])) 
    {
        if(empty($_POST['userprofile']))
        {
            $errorUserprofile= " you can upload your profile or not";
        }
        if(empty($_POST['name']))
        {
            $errorName= "need to fill your name!";
        } else 
        {
            $name=$_POST['name'];
        }
        
        if(empty($_POST['email']))
        {
            $errorEmail= "need to fill your email!";
        } 
        if(!empty($_POST['email']))
        {   
            $email = $_POST['email'];
            $email_query = "SELECT * FROM users WHERE email='{$email}' AND id != '{$userID}'";
            $email_result = mysqli_query($conn, $email_query);
            
            if (mysqli_num_rows($email_result) > 0) {
                $errorEmailExist= "This email is already registered with another user.";
            } 

        }

       
        if(!empty($_FILES['userprofile']['name']) && empty( $errorName) && empty($errorEmail) )
        {
                $targetDir = '../images/';
                $filename = uniqid() . '_' . $_FILES['userprofile']['name'];
                $targetFilePath = $targetDir . $filename;
               
                if(move_uploaded_file($_FILES['userprofile']['tmp_name'], $targetFilePath))
                {
                    $update_query = "UPDATE users SET name='{$name}', email='{$email}', img='{$filename}' WHERE id='{$userID}'";
                    if(mysqli_query($conn, $update_query)) 
                    {
                        header('Location:../index.php');
                        exit();
                    }
                }
            
        }
        if(!empty( $errorName) && !empty($errorEmail) ) 
        {
            if(!empty($_FILES['userprofile']['name'])) 
            {
                $filename = uniqid() . '_' . $_FILES['userprofile']['name'];
                $targetFilePath = $targetDir . $filename;
               
                if(move_uploaded_file($_FILES['userprofile']['tmp_name'], $targetFilePath))
                {
                    $update_query = "UPDATE users SET img='{$filename}' WHERE id='{$userID}'";
                    if(mysqli_query($conn, $update_query)) 
                    {
                        header('Location:../index.php');
                        exit();
                    }
                }
            } 
        }elseif(empty($_FILES['userprofile']['name']) && empty( $errorName) && empty($errorEmail))
        {
            $update_query = "UPDATE users SET name='{$name}', email='{$email}' WHERE id='{$userID}'";
            if(mysqli_query($conn, $update_query)) 
            {
                header('Location:../index.php');
                exit();
            } 
        }
    }
?>
<body>
    <div class="container">  
    <div class="row">
            <div>
            <div class="pt-3">
                <a href="#" class="text-decoration-none text-secondary">Home</a>
                <div class="float-end ">
                <img src="../images/<?php echo !empty($user['img']) ? $user['img'] : 'default_profile.png'; ?>" class="img-width" alt="profile_picture">
                </div>        
            </div>      
        </div>      
        <div class="space">
            <div class="card card-width mx-auto">
                <div class="card-title">
                    <h3>My Profile Setting</h3>
                </div>
                <div class="card-body">
                    <form  method="post"  enctype="multipart/form-data">
                    <input type="hidden" name="userID" value="<?php echo $userID; ?>">
                    <img src="../images/<?php echo !empty($user['img']) ? $user['img'] : 'default_profile.png'; ?>" class="profile-width" alt="profile_picture">
                        <input type="file" name="userprofile" >
                        <small class="text-danger"><?php echo $errorUserprofile ?></small><br>
                        <label>Name</label>
                        <input type="text" placeholder="Enter your name" class="form-control" name="name">
                        <small class="text-danger"><?php echo $errorName?></small><br>
                        <label>Email</label>
                        <input type="email" placeholder="example@gmail.com" class="form-control" name="email">
                        <small class="text-danger"><?php echo $errorEmail ?></small><br>
                        <small class="text-danger"><?php echo $errorEmailExist ?></small><br>
                        <button type="submit" class="btn btn-primary text-white mt-3 float-end"  name="update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>