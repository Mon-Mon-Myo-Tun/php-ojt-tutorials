<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
	<title>Document</title>
</head>
<body>
    <?php
        require 'libs/vendor/autoload.php';
        use PhpOffice\PhpSpreadsheet\IOFactory;

        function ReadText($text_file_name)
        {
            $file = fopen($text_file_name, "r");
            while (!feof($file))
            {
             echo  $readFile= fgets($file) . "<br />";
            }
            fclose($file);
        }

        function ReadDoc($file_name) 
        {
            if(file_exists($file_name))
            {
                if(($fh = fopen($file_name, 'r')) !== false ) 
                {
                    $headers = fread($fh, 0xA00);
                    $num1 = ( ord($headers[0x21C]) - 1 );
                    $num2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );
                    $num3 = ( ( ord($headers[0x21E]) * 256 ) * 256 );
                    $num4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );
                    $textLength = ($num1 + $num2 + $num3 + $num4);
                    $plaintext = fread($fh, $textLength);
                    return nl2br($plaintext);   
                }
            } 
               
        }

        function ReadExcel($inputFileName)
        {
            $spreadsheet = IOFactory::load($inputFileName);
            $worksheet = $spreadsheet->getActiveSheet();
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            $headers = [];

            for ($col = 'A'; $col <= $highestColumn; $col++)
            {
                $headers[] = $worksheet->getCell($col.'1')->getValue();
            }
            echo '<table class="tb-excel">';
            echo '<tr>';
            foreach ($headers as $header) 
            {
                echo '<th> ' . $header . '</th> ' ;
            }
            echo '</tr>' ;

            for ($row = 2; $row <= $highestRow; $row++)
            {
            echo '<tr>';
                for ($col = 'A'; $col <= $highestColumn; $col++) 
                {
                    echo '<td>' . $worksheet->getCell($col.$row)->getValue() . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';

        }
        
        function ReadCSV($filename) {
            $file = fopen($filename, 'r');
            $headers = fgetcsv($file); // Get the column headers from the first row
            echo '<table class="tb-excel">';
            echo '<tr>';
            foreach ($headers as $header) {
                echo '<th>' . htmlspecialchars($header) . '</th>';
            }
            echo '</tr>';
            while (($data = fgetcsv($file)) !== FALSE) {
                echo '<tr>';
                foreach ($data as $value) {
                    echo '<td>' . htmlspecialchars($value) . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
            fclose($file);
        }
        
    ?>
	<div class="main">
        <div class="container">
            <div class="content">
                <h2>Text File </h2>
                <hr>
                <?php echo ReadText("files/sample.txt"); ?><br>
                
                <h2>Document File </h2>
                <hr>
                <?php echo  ReadDoc("files/sample.doc"); ?><br>
                <h2>Excel File </h2>
                <hr>
                <?php echo ReadExcel("files/sample.xlsx"); ?><br>
                <h2>CVS File </h2>
                <hr>
                <?php echo ReadCSV("files/sample.csv"); ?><br>
            </div>
            <!-- .content -->
        </div>
        <!-- .container -->
	</div>
</body>
</html>