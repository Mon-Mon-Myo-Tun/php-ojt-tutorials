<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
</head>
<body>
<?php
    include "db.php";
    include "create_table.php";
    session_start();
    $errorMsg="Error retrieving user record from the database.";
    if (isset($_SESSION['user_id']))
    {
        $userID = $_SESSION['user_id'];
        $user_query = "SELECT * FROM users WHERE id={$userID}";
        $user_result = mysqli_query($conn, $user_query);
        if ($user_result !== false) 
        {
            $user = mysqli_fetch_assoc($user_result);
            echo ' <div class="container"> ';
                echo ' <div class="row pt-3">';
                    echo "<div>";
                        echo '<a href="#" class="text-decoration-none text-secondary">Home</a>';
                        echo '<img src="../images/' . (!empty($user['img']) ? $user['img'] : 'default_profile.png') . '" class="img-width float-end" alt="profile_picture">';
                    echo'</div>';
                echo'</div>';
                echo '
                    <div class="card float-end mt-1 ">
                        <div class="card-body">
                            <a href="auth/profile.php" class="text-decoration-none text-secondary">Profile</a><br>
                            <a href="index.php?logout=true" class="text-decoration-none text-secondary" name="logout">Logout</a>
                        </div>
                    </div>
                ';
                echo '<h2 class="text-center text-secondary  space">Welcome From My Website</h2>';
            echo "</div>";
        } else 
        {
            echo $errorMsg;
        }
    } else
    {
        echo '
                <div class="container">
                    <div class="pt-3">
                            <a href="#" class="text-decoration-none text-secondary">Home</a>
                                <div class="float-end">
                            <div class="btn btn-info">
                                <a href="../auth/login.php" class="text-decoration-none text-white ">Login</a>
                            </div>
                                <div class="btn btn-info">
                                <a href="../auth/register.php" class="text-decoration-none text-white ">Register</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="text-center text-secondary  space">Welcome From My Website</h2>
                </div> ';
    }

    if (isset($_GET['logout'])) {
        unset($_SESSION['user_id']);
        session_destroy();
        header('Location: index.php');
        exit;
    }
?>
</body>
</html>