<?php
function sumEvenNumbers($arr) {
    $sum = 0;
    foreach ($arr as $number) {
        if ($number % 2 == 0) {
            $sum += $number;
        }
    }
    return $sum;
}

// Example usage:
$numbers = [1, 2, 3, 4, 5, 6];
$result = sumEvenNumbers($numbers);
echo "The sum of even numbers in the array is: " . $result;
?>