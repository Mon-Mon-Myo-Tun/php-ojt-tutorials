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
function getAge($dob){
  $bday = new DateTime($dob);
  $today = new Datetime(date('m.d.y'));
  $diff = $today->diff($bday);
  return 'Your age is : '.$diff->y.' Years, '.$diff->m.' months, '.$diff->d.' days';
}
?>

<?php
    if( empty($_GET['dob'])){?>
      <div class="result-wrapper">
        
        <?php echo "Please fill date . ! REQUIRED";?>
        
      </div>
    <?php }
  ?> <br>


<?php
    if(isset($_GET['dob']) && $_GET['dob']!=''){?>
      <div class="result-wrapper">
        
        <?php echo getAge($_GET['dob']);?>
        
      </div>
    <?php }
  ?> <br>



<div class="form-wrapper">
<h2>Age Calculator</h2>
  <form>
    <div class="input-wrapper">
      <label>Date of Birth :</label>
      <input type="date"  class="birth" required name="dob" value="<?php echo (isset($_GET['dob'])) ?$_GET['dob']:'' ;?>"> <br>
      <input type="submit" value="Calculate Age" class="btn">
    </div>
  </form>
  
</div>


</body>
</html>