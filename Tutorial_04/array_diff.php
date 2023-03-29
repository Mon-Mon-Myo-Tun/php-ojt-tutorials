<?php

$a = [1,2];
$b = [1];

function arrayDiff($arr1, $arr2) {
  $result = [];
  foreach ($arr1 as $var_a) {
    if (!in_array($var_a, $arr2)) {
      $result[] = $var_a;
    }
  }
  return json_encode($result);
}

$result = arrayDiff($a, $b);
echo $result;

?>
<!--// Result
// arrayDiff([1, 2], [1]); // output => [2]
// arrayDiff([1, 2, 2], [1]); // output => [2, 2]
// arrayDiff([1, 2, 2], [2]); // output => [1]
// arrayDiff([1, 2, 2], []); // output => [1, 2, 2]
// arrayDiff([], [1, 2]); // output => []
// arrayDiff([1, 2, 3], [1, 2]); // output => [3]-->
