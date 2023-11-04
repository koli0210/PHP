<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user input
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Database connection
    $db = new mysqli('localhost', 'username', 'password', 'your_database_name');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Insert user data into the "users" table
    $insert_query = "INSERT INTO users (name, email) VALUES (?, ?)";
    $stmt = $db->prepare($insert_query);
    $stmt->bind_param("ss", $name, $email);

    if ($stmt->execute()) {
        echo "User information saved successfully. Thank you!";
    } else {
        echo "Error: User information could not be saved.";
    }

    $stmt->close();
    $db->close();
}
?>