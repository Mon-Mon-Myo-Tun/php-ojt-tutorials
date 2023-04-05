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
    <?php  include "upload.php"; ?>
    
    <main>
        <section class=" container ">
            <div class="row py-lg-5 d-flex">

                <div class="col-lg-6 col-md-8 card-width mx-auto">
                    <p class="text-center bg-info mb-4 ">
                        <?php

                            if(isset($success_msg))
                            {
                            echo $success_msg; 
                            }

                            if(isset($error_msg))
                            { 
                                echo $error_msg; 
                            } 
                        ?>

                    </p>

                    <div class="card ">
                        <div class="card-title text-center ">Upload Image</div>
                        <div class="card-body">
                        
                            <form  method="post" enctype="multipart/form-data" >
                            <label>Folder Name</label>
                            <input type="text" placeholder="Enter folder name" class="form-control" name='foldername'>
                            <small class="text-danger"><?php echo $errorName; ?></small> <br>

                            <label>Choose Image</label>
                            <input type="file"  class="form-control" name='filename'>
                            <small class="text-danger"><?php echo $errorfilename; ?></small> <br>

                        

                            <button type="submit" class="btn btn-dark text-white mt-3 btn-width" name="upload">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
   
    <div class="container">
        <div class="row">
            <?php
            $file_names = array();
            $dirs = array_filter(glob('images/*'), 'is_dir');
            foreach ($dirs as $dir) {
                $files = scandir($dir);
                foreach ($files as $file) {
                    if ($file !== '.' && $file !== '..') 
                    {
                    
                        if (in_array($file, $file_names))
                        {
                            continue;
                        }
                    
                        $file_names[] = $file;
                        $path = 'http://localhost/php-ojt-tutorials/Tutorial_06/' . $dir . '/' . $file;
                        echo '<div class="col-md-4 mb-3">';
                        echo '<div class="card">';
                        echo '<img src="' . $path . '" class="card-img-top img-fluid">';
                        echo '<div class="card-body">';
                        echo '<p class="card-text text-center">' . $file  . '</p>';
                        echo '<p class="card-text">' . $path . '</p>';
                        echo '<form method="post" action="">';
                        echo '<input type="hidden" name="image_folder" value="' . $dir . '">';
                        echo '<input type="hidden" name="image_file" value="' . $file . '">';
                        echo '<button type="submit" class="btn btn-danger card-btn" name="delete_image">Delete</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
            }
            ?>
        </div>
    </div>
    <?php

        if (isset($_POST['delete_image'])) 
        {
            if (isset($_POST['image_folder']) && isset($_POST['image_file'])) 
            {
                $image_folder = $_POST['image_folder'];
                $image_file = $_POST['image_file'];
                $image_path = 'C:\\Apache24\\htdocs\\php-ojt-tutorials\\Tutorial_06\\' . $image_folder . '\\' . $image_file;
                if (file_exists($image_path))
                 {
                    if (unlink($image_path)) 
                    {
                        echo "Image deleted successfully";
                    } 
                } 
                else 
                {
                    echo "Image not found";
                }
            }
        }
    ?>
</body>
</html>