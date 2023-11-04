<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Database connection
    $db = new mysqli('localhost', 'username', 'password', 'user_auth');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Check if the email is already in use
    $check_email_query = "SELECT * FROM users WHERE email = ?";
    $stmt = $db->prepare($check_email_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email is already in use.";
    } else {
        // Insert the user into the database
        $insert_user_query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $db->prepare($insert_user_query);
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            echo "Registration successful. <a href='login.php'>Login here</a>";
        } else {
            echo "Registration failed.";
        }
    }

    $db->close();
}
?>