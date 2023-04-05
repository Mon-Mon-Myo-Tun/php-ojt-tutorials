
<?php
/* 
    * Convert an Array to phone number format
    * 
    * @param $numberArray

*/

    function createPhoneNumber($numberArray)
    {
       
        $integervalue = count($numberArray) === count(array_filter($numberArray, 'is_int'));

        if (!$integervalue) {
            return "Input array must contain only integers.";
        }

        $phoneNumber = "(";
        
        for ($i = 0; $i < 3; $i++) {
            $phoneNumber .= $numberArray[$i];
        }
        
        $phoneNumber .= ") ";
        
        for ($i = 3; $i < 6; $i++) {
            $phoneNumber .= $numberArray[$i];
        }
        
        $phoneNumber .= "-";
        
        for ($i = 6; $i < count($numberArray); $i++) {
            $phoneNumber .= $numberArray[$i];
        }
        
        return $phoneNumber;
    }

echo createPhoneNumber([1,1, 2, 3, 4, 5, 6, 7, 8, 9, 0,1,5]); 
echo "<br>";
echo createPhoneNumber([2.4,"two","three", 'four', "five"]);



