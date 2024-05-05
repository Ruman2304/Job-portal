<?php
session_start();

if (isset($_GET['blogId'])) {
    $blogId = $_GET['blogId'];

    // Check if the user has already liked this blog
    if (!isset($_SESSION['liked_blogs'])) {
        $_SESSION['liked_blogs'] = array();
    }

    if (!isset($_SESSION['liked_blogs'][$blogId]) || !$_SESSION['liked_blogs'][$blogId]) {
        // The user has not liked this blog before, proceed to update likes count
        $conn = new mysqli("localhost", "root", "", "jobportaldb");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch current likes count
        $result = $conn->query("SELECT likes FROM blog WHERE blogid = $blogId");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $currentLikes = $row['likes'];

            // Increment likes count
            $newLikes = $currentLikes + 1;

            // Update likes count in the database
            $conn->query("UPDATE blog SET likes = $newLikes WHERE blogid = $blogId");

            // Mark the blog as liked in the session
            $_SESSION['liked_blogs'][$blogId] = true;

            // Return the updated likes count
            echo $newLikes;
        }

        $conn->close();
    } else {
        // The user has already liked this blog, do not update likes count
        echo "already_liked";
    }
}
?>
