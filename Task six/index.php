<?php
$numbers = array(2, 4, 6, 8, 10);

// i. Print the first element of the array.
echo "i. The first element of the array is: " . $numbers[0] . "<br>";

// ii. Print the last element of the array.
$lastIndex = count($numbers) - 1;
echo "ii. The last element of the array is: " . $numbers[$lastIndex] . "<br>";

// iii. Add a new element with the value of 12 to the end of the array.
$numbers[] = 12;

// iv. Calculate the sum of all the elements in the array and print the result.
$sum = array_sum($numbers);
echo "iv. The sum of all elements in the array is: " . $sum . "<br>";
?>