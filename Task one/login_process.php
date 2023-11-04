<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    $db = new mysqli('localhost', 'username', 'password', 'user_auth');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Retrieve user data by email
    $get_user_query = "SELECT * FROM users WHERE email = ?";
    $stmt = $db->prepare($get_user_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
        } else {
            echo "Incorrect password. <a href='login.php'>Try again</a>";
        }
    } else {
        echo "Email not found. <a href='register.php'>Register here</a>";
    }

    $db->close();
}
?>