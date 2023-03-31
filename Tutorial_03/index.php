<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  <link rel="stylesheet" href="css/reset.css">
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
        
        if ($bday > $today) 
        {
            echo "date must not greater than or equal tomorrow ";
        } 
        else
        {
            $diff = $today->diff($bday);
            return 'Your age is : '.$diff->y.' Years, '.$diff->m.' months, '.$diff->d.' days';
        }
    
    }

?>

<div class="result-wrapper">
    <?php
        if(isset($_POST ['dob']) && !empty($_POST['dob']))
        {
            echo getAge($_POST['dob']);
        }
        elseif(isset($_POST['dobBtn']))
        {
            echo "required!";
            
        }
    ?> 
</div>
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