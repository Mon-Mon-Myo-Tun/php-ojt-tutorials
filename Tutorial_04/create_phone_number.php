<?php
function createPhoneNumber($numberArray)
{
    $phoneNumber = "(";
    
    for ($i = 0; $i < 3; $i++) {
        $phoneNumber .= $numberArray[$i];
    }
    
    $phoneNumber .= ") ";
    
    for ($i = 3; $i < 6; $i++) {
        $phoneNumber .= $numberArray[$i];
    }
    
    $phoneNumber .= "-";
    
    for ($i = 6; $i < 10; $i++) {
        $phoneNumber .= $numberArray[$i];
    }
    
    return $phoneNumber;
}

echo createPhoneNumber([7,1, 2, 3, 4, 5, 6, 7, 8, 9, 0]); 


// Result
// createPhoneNumber([1, 2, 3, 4, 5, 6, 7, 8, 9, 0]); // output => (123) 456-7890
// createPhoneNumber([1, 1, 1, 1, 1, 1, 1, 1, 1, 0]); // output => (111) 111-1110
