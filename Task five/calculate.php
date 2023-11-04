<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user input
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    // Ensure that the input is numeric
    if (is_numeric($num1) && is_numeric($num2)) {
        // Perform calculations
        $sum = $num1 + $num2;
        $difference = $num1 - $num2;
        $product = $num1 * $num2;
        
        // Check if the second number is not zero before calculating the quotient
        if ($num2 != 0) {
            $quotient = $num1 / $num2;
        } else {
            $quotient = "Undefined (division by zero)";
        }

        // Display the results
        echo "Sum: $sum<br>";
        echo "Difference: $difference<br>";
        echo "Product: $product<br>";
        echo "Quotient: $quotient<br>";
    } else {
        echo "Please enter valid numeric values.";
    }
}
?>