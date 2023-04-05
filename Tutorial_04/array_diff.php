<?php
/* 
    * Compares the values of two (or more) arrays, and returns the differences.
    * 
    * @param $arr1,$arr2

*/
    $arr_one = [1,2];
    $arr_two = [1];

    function arrayDiff($arr1, $arr2) 
    {
        $result = [];
        foreach ($arr1 as $var_a) 
        {
            if (!in_array($var_a, $arr2))
            {
                $result[] = $var_a;
            }
        }
        return json_encode($result);
    }
    $result = arrayDiff( $arr_one,$arr_two);
    echo $result;
?>
