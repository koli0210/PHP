<?php
function countVowels($inputString) {
    // Convert the input string to lowercase to treat upper- and lowercase letters as equivalent
    $inputString = strtolower($inputString);

    // Define an array of vowels
    $vowels = ['a', 'e', 'i', 'o', 'u'];

    // Initialize a variable to keep track of the vowel count
    $vowelCount = 0;

    // Iterate through each character in the string
    for ($i = 0; $i < strlen($inputString); $i++) {
        $char = $inputString[$i];

        // Check if the character is alphabetic and a vowel
        if (ctype_alpha($char) && in_array($char, $vowels)) {
            $vowelCount++;
        }
    }

    return $vowelCount;
}

// Example usage:
$inputString = "Hello, world!";
$result = countVowels($inputString);
echo "The number of vowels in the string is: " . $result;
?>