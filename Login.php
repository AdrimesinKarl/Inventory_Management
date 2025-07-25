<?php

session_start();
require_once  'db.php';


$usernameErr = $passwordErr = "";
$username = $password = "";

// Sanitize input
function test_input($data) {
    return htmlspecialchars(trim($data));
}

// Restore remembered username if cookie is set
if (isset($_COOKIE["remember_username"])) {
    $username = $_COOKIE["remember_username"];
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = test_input($_POST["username"] ?? '');
    $password = test_input($_POST["password"] ?? '');

    // Validate input
    if (empty($username)) {
        $usernameErr = "*Username is required";
    }

    if (empty($password)) {
        $passwordErr = "*Password is required";
    }

    if (empty($usernameErr) && empty($passwordErr)) {
        // Get user from DB
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            //  Set session
            
            $_SESSION["username"] = $user['username'];

            // Set cookie if "Remember Me" checked
            if (isset($_POST["remember"])) {
                setcookie("remember_username", $username, time() + (86400 * 7), "/");
            } else {
                setcookie("remember_username", "", time() - 3600, "/"); // clear
            }
            //  Redirect
            header("Location: dashboard.php");
            exit();
        } else {
            $passwordErr = "*Invalid username or password";
        }
        
    }
}

require_once 'Login_Form.php';
?>



