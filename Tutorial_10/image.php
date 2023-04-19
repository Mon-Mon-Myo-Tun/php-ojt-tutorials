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
    // Establish database connection here
    include "../db.php";
    session_start();
  $user_id = $_SESSION['user_id'];
    $message = "";
    if (isset($_POST['btnUpload']))
    {
    if (!empty($_FILES['userprofile']['name'])) 
    {
        $imgname = $_FILES['userprofile']['name'];
        $path = $_FILES['userprofile']['tmp_name'];
        $target_file = '../images/' . $imgname;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($path);
         $saveimg= "<img src='$target_file'>";
        
        if ($check !== false && in_array($imageFileType, array("jpg", "jpeg", "png")))
        {
           $movefile= move_uploaded_file($path, $target_file);
         
        } else 
        {
            $message = "File is not a valid image file with extension .jpg, .jpeg, or .png.";
        }
    }
    else 
    {
        $message = "Please select a file.";
    }
} 
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        
        // Check if email already exists in the database
        $check_email_query = "SELECT * FROM users WHERE email='$email'";
        $check_email_result = mysqli_query($conn, $check_email_query);
        $existing_user = mysqli_fetch_assoc($check_email_result);
       
        if ($existing_user && $existing_user['name'] !== $name)
        {
            $message = "Email already exists in the database with a different name.";
        } 
//        else 
//        {
//            $imgname = "";
//            if (!empty($_FILES['userprofile']['name'])) 
//            {
//                $imgname = $_FILES['userprofile']['name'];
//                $path = $_FILES['userprofile']['tmp_name'];
//                $target_file = '../images/' . $imgname;
//                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//                $check = getimagesize($path);
//                
//                if ($check !== false && in_array($imageFileType, array("jpg", "jpeg", "png")))
//                {
//                    move_uploaded_file($path, $target_file);
//                } else 
//                {
//                    $message = "File is not a valid image file with extension .jpg, .jpeg, or .png.";
//                }
//            }
//            // Fetch user data from the database using user ID
//                $userID= $_SESSION['user_id'];
//                $user_query = "SELECT * FROM users WHERE id={$userID}";
//                $user_result = mysqli_query($conn, $user_query);
//                $user = mysqli_fetch_assoc($user_result);
//
//            // Update the user's profile information
//            
//            $update_query = "UPDATE users SET name='$name', email='$email',img='$imgname',updated_datetime=NOW() WHERE id={$user['id']}";
//
//            $update_result = mysqli_query($conn, $update_query);
//
//           if (!$update_result) {
//             $message = "Failed to update user's profile information. Please try again later.";
//        } else {
//               $message = "User's profile information has been updated successfully.";
//          }
//
//          if (!$update_result) {
//            $message .= " Error: " . mysqli_error($conn);
//        }
//        }
    }
    
?>
<body>
    <div class="container">  
    <div class="row">
            <div>
                <a href="#" class="text-decoration-none text-secondary">Home</a>
                <?php if (!empty($user['img'])): ?>
                    <img src="../images/<?php echo $user['img']; ?>" alt="Profile" class="float-end img-width">
                <?php else: ?>
                    <img src="../images/default_profile.png" alt="Default Profile" class="float-end img-width">
                <?php endif; ?>
            </div>      
        </div>      
        <div class="space">
            <div class="card card-width mx-auto">
                <div class="card-title">
                    <h3>My Profile Setting</h3>
                </div>
                <div class="card-body">
                    <form  method="post"  enctype="multipart/form-data">
                        <input type="submit" value="Upload" name="btnUpload">
                        <input type="file" name="userprofile" class="form-control" >
                        <small class="text-danger"><?php echo $message ?></small><br>
                        <label>Name</label>
                        <input type="text" placeholder="Enter your name" class="form-control" name="name">
                        <label>Email</label>
                        <input type="email" placeholder="example@gmail.com" class="form-control" name="email">
                        <button type="submit" class="btn btn-primary text-white mt-3 float-end"  name="update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>