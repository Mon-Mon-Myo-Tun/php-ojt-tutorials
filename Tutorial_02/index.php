<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="css/rest.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="diamond">
        <h2>Diamond Pattern</h2>
        <div class="pattern">
            <?php
                /**
                 * Show the application dashboard
                 *
                 * @param $row
                 */
                function makeDiamondShape($row)
                {
                    if(!is_int($row)) 
                    {
                        echo "Error: Input must be an integer.";
                    }else if($row % 2 == 0) 
                    {
                        echo "$row must be  positive odd number";
                    
                    } elseif($row <= 0)
                    {
                        echo "$row must be positive number";
                    }
                    else
                    {
                        $n=($row+1)/2;
                        $m=0;
                        for($i=1;$i<=$row;$i++)
                        {
                            $i<=$n ? $m++ : $m--;
                            for($j=1;$j<=$row;$j++)
                        {
                            if(($j >= $n+1-$m ) && ($j<=$n-1+$m))
                            {
                                echo "*";
                            }else 
                            {
                                echo " &nbsp; ";
                            }
                        }   echo "<br>";
                        }
                    } 
                }
                makeDiamondShape(7);
            ?>
        </div>
    </div>
</body>
</html>