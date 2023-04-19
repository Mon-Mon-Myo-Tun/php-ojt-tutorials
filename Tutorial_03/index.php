<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
    /* 
    * Date of Birth
    * 
    * @param $dob
    */
    function getAge($dob)
    {   
        $bday = new DateTime($dob);
        $today = new Datetime(date('m.d.y'));
        $errorMsg="Date must not greater than or equal today ";
        
        if ($bday > $today) 
        {
            echo $errorMsg;
        } 
        else
        {
            $diff = $today->diff($bday);
            $year=$diff->y>1 ? "years" : "year";
            $month=$diff->m >1 ? "months" : "month";
            $day=$diff->d >1 ? "days" : "day";

            return 'Your age is : '.$diff->y.$year." ".$diff->m.$month." ".$diff->d.$day;
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $errorRequired="The date field is required";
        echo "<div class=\"result-wrapper\">";
        if(isset($_POST ['dob']))
        {   
            echo getAge($_POST['dob']);
        } 
        else{
            echo $errorRequired;
        }  
        echo "</div>";
    } 
?>
    <div class="form-wrapper">
        <h2>Age Calculator</h2>
        <form method="post">
            <div class="input-wrapper">
                <label>Date of Birth :</label>
                <input type="date"  class="birth"  name="dob" value="<?php echo (isset($_POST['dob'])) ?$_POST['dob']:'' ;?>"> <br>
                <input type="submit" value="Calculate Age" class="btn" name="dobBtn">
            </div>
        </form>
    </div>
</body>
</html>