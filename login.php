<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Include your database configuration file
include_once "db_config.php"; // Replace with your actual database config file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    echo "Username: " . $username . "<br>";
    echo "Password: " . $password . "<br>";
    $username = trim($username);
    $password = trim($password);

    // Connect to the database
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to retrieve user data by username
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);
    echo "Query: " . $query . "<br>";
    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        var_dump($user);

        // Verify the entered password against the hashed password
        if (password_verify($password, $user["password"])) {
            // Password is correct, set session variable
            $_SESSION["username"] = $username;
            header("Location: staff_page.php"); // Redirect to the staff page
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    // Close the database connection
    $conn->close();
}
?>
