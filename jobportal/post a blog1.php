<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['user_id'])) {
    $conn = new mysqli("localhost", "root", "", "jobportaldb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $blogtitle = $_POST["bname"];
    $blogdescription = $_POST["blogdescription"];
    $author = $_POST["author"];
    // Get the username from the session
    $userid = $_SESSION['user_id'];
    $fetchUser = $conn->query("SELECT username FROM register WHERE userid = $userid");
    $userData = $fetchUser->fetch_assoc();

    if ($userData) {
        $username = $userData['username'];

        // Insert data into the 'blog' table
        $sql = "INSERT INTO blog (title, blogdescription, author, username,userid) 
                VALUES ('$blogtitle', '$blogdescription', '$author', '$username','$userid')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Blog inserted successfully");</script>';
            header("Location:post a blog.php");
        } else {
            echo '<script>alert("Error inserting blog: ' . $conn->error . '");</script>';
        }
    } else {
        echo '<script>alert("User data not found");</script>';
    }

    $conn->close();
}
?>

