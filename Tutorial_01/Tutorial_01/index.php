<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChessBoard </title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
 
</head>

<body>
<div class="chess">
<h2> Chessboard</h2>
<div class="table1">
    <table class="tb">
    <?php

        function drawChessBorad($rows, $cols)
        {
            if (!$rows >0 || !$cols > 0) 
            {
                if (!$rows >0 && ! $cols>0) 
                {
                    echo "rows and cols parameters must be greater than 0.";
                } elseif (!$rows>0 &&  !is_int($cols)) 
                {
                    echo "rows must be greater than 0 and colums must be integer";
                } elseif (!is_int($rows) && !$cols>0) 
                {
                    echo "rows must be number and colums must be greater than 0";
                } elseif (!$rows >0) 
                {
                    echo "row must be greater than 0";
                } elseif (!$cols >0) 
                {
                    echo "columns must be greater than 0";
                }
            } elseif (!is_int($rows) || !is_int($cols))
                {
                    if (!is_int($rows) && !is_int($cols)) 
                    {
                        echo "rows and colums must be number.";
                    } elseif (!is_int($rows))
                    {
                        echo "rows must be  number";
                    } elseif (!is_int($cols)) 
                    {
                        echo "colums must be  number";
                    }
                } elseif ($rows && $cols) 
                {
            
                    for ($i = 1; $i <= $rows; $i++) 
                    {
                        echo"<tr>";

                        for ($j = 1; $j <= $cols; $j++)
                        {
                            if (($i + $j) % 2 == 0)
                            {
                                $color="black";
                            } else 
                            {
                                $color="white";
                            } echo " <td class='chess-blk {$color}' ></td>";
                        }
                    // Add a line break after each row
                    }   echo"</tr>";
                
                }
        }
    drawChessBorad(5,5);
    ?>
    </table>
</div>
</div>
</body>
</html>
