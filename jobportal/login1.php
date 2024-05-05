<?php
// Sanitize and validate user input
$conn = new mysqli("localhost", "root", "", "jobportaldb");

// Check connection
session_start();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $login_username = $_POST["uname"];
    $login_password = $_POST["psw"];

    // Retrieve user data from the database
    $sql = "SELECT userid, username,password FROM register WHERE username = '$login_username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($login_password == $row["password"]) {
            // Set session variables
            $_SESSION["user_id"] = $row["userid"];
            $_SESSION["username"] = $row["username"];
    
            // Redirect based on the username
            if ($login_username == "admin" && $login_password == "admin") {
                header("Location: admin.php");
            } else {
                header("Location: home.php");
            }
            exit();
        } else {
            echo '<script>alert("Invalid password");</script>';
        }
    } else {
        echo '<script>alert("User not found");</script>';
    }
    
    $conn->close();
    ?>