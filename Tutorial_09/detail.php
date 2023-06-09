<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Detail</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        include 'db.php';
        if(isset($_GET['viewid'])) 
        {
            $id = $_GET['viewid'];
            $query = "SELECT * FROM posts WHERE id = '$id'";
            $result = mysqli_query($conn, $query);
            if($result) {
                $post = mysqli_fetch_assoc($result);
            } else {
                echo "Error retrieving data";
            }
        }
    ?>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2>Post Details</h2>
                    </div>
                    <div class="card-body">
                        <h3><?php echo $post['title']; ?></h3>
                        <p>
                            <?php
                                $format= $post['created_datetime'];
                                $formatted_date = date("M d, Y", strtotime( $format));
                                if ($post['is_published'])
                                {
                                    echo "Published  at".'&nbsp;' .$formatted_date;
                                } else
                                {
                                    echo "Is not published" .'&nbsp;' .$formatted_date;
                                }
                            ?>
                        </p>
                        <p><?php echo $post['content']; ?></p>
                        <div class="mb-3">
                            <a href="index.php" class="btn btn-dark">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
