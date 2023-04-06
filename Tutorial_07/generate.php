<?php
    include('libs/phpqrcode/qrlib.php');

    $errorName=$errorFile=$showimage = "";
        
    if(isset($_POST['generate']))
    {
        $qrname = $_POST['QRname'];
        if(empty($qrname))
        {
            $errorName="QR name field is required!";
        
        }
        elseif (file_exists('images/'.$qrname.'.png'))
        {
            $errorFile = 'A QR code with that name already exists.';
        } 
        else 
        {
            $data = 'Hello,Create QR Code';
            $file_name = 'images/'.$qrname.'.png';

            QRcode::png($data, $file_name);
            $showimage='<img src="'.$file_name.'" alt="'.$qrname.'">';  

        }
    }
?>



