<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php  
        include 'db.php';
        $title_error = $content_error = '';
        $title = $content = '';
        if(isset($_POST['create'])){
            if(empty($_POST['title'])){
                $title_error = 'Title is required';
            } else {
                $title = $_POST['title'];
            }
        
            if(empty($_POST['content'])){
                $content_error = 'Content is required';
            } else {
                $content = $_POST['content'];
            }
        
            if(empty($title_error) && empty($content_error)){
                
                $publish = isset($_POST['publish']) ? 1 : 0;
                $sql = "INSERT INTO posts (title, content, is_published) VALUES ('$title','$content','$publish')";
                $result=mysqli_query($conn,$sql);
                if($result){
                    echo "success";
                }else{
                    die(mysqli_connect_error($conn));
                }
                
                header('Location: index.php');
                exit;
            }
        } 
    ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2>Create Post</h2>
                    </div>

                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title">
                                <span class="text-danger"><?php echo $title_error; ?></span>
                            </div>
                            <div class="mb-3">
                                <label>Content</label>
                                <textarea name="content" rows="5" cols="30" class="form-control"></textarea>
                                <span class="text-danger"><?php echo $content_error; ?></span>
                            </div>
                            <div class="mb-3">
                                <input type="checkbox"  name="publish" value="publish">
                                <label>publish</label>
                            </div>
                            <div class="mb-3">
                                <a href="index.php" class="btn btn-dark">Back</a>
                                <input type="submit" value="create" class="btn btn-info float-end" name="create">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

