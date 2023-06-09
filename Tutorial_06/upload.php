<?php
    $errorName = $errorfilename = $errorfilesize = $folder_name = "";
    
    if (isset($_POST['upload'])) 
    {
        if (empty($_POST['foldername'])) 
        {
            $errorName = "Folder name field is required...";
        } 
        else 
        {
            $folder_name = $_POST['foldername'];
        }

        if (empty($_FILES['filename']['name'])) 
        {
            $errorfilename = "Image field is required ...";
        } 
        else
        {
            $image_name = $_FILES['filename']['name'];
            $image_temp = $_FILES['filename']['tmp_name'];
            $upload_path = "images/" . $folder_name . "/" . $image_name;
            $image_info = getimagesize($image_temp);

            if ($_FILES['filename']['size'] > 20000) 
            {
                echo '<script>alert("File size should not exceed 2000 bytes");</script>';
            }
            else 
            {
                if (!file_exists("images/" . $folder_name)) 
                {
                    mkdir("images/" . $folder_name, 0777, true);
                } 

                if (file_exists($upload_path)) 
                {
                    $errorfilename = "File with the same name already exists in the folder...";
                } 
                else if (move_uploaded_file($image_temp, $upload_path) && !empty($_POST['foldername'])) 
                {
                    $success_msg = "Uploaded image successfully.";
                } 
                else 
                {
                    $error_msg = "Error uploading file. You need to add folder!";
                }
            }
        }
    }     
?>