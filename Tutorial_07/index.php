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
    <?php include "generate.php"?>
    <main>
            <section class=" container ">
                <div class="row py-lg-5 d-flex">

                    <div class="col-lg-6 col-md-8 card-width mx-auto">
                        

                        <div class="card ">
                            <div class="card-title text-center ">QR Code Generator</div>
                            <div class="card-body">
                            
                                <form  method="post" >
                                <label for="qrname">QR Name</label>
                                <input type="text" placeholder="Enter QR Name" class="form-control" name='QRname'>
                                <small class="text-danger"><?php echo $errorName; ?></small> 
                                <small class="text-danger"><?php echo $errorFile; ?></small><br>

                                <button type="submit" class="btn btn-primary text-white mt-3 btn-width" name="generate">Generate</button>
                                </form>
                            </div>
                        </div>
                        <p class="text-center mb-4 ">
                            <?php  echo $showimage;  ?>       
                        </p>        
                    </div>
                </div>
        </section>

        <section class="container">
            <div class="row">
                <p>QR Lists</p>
                <?php
            
                    $files = glob('images/*.png');
                    foreach ($files as $file) 
                    {
                        $file_name = basename($file, '.png');
                        echo '
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="'.$file.'" class="card-img-top" alt="'.$file_name.'">
                                <div class="card-body">
                                    <p class="card-title text-center">'.$file_name.'</p>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                ?>
            </div>
        </section>
    </main>  
</body>
</html>