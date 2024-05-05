<?php
// Sanitize and validate user input
$conn = new mysqli("localhost", "root", "", "jobportaldb");

// Check connection
session_start();
if (isset($_SESSION['user_id'])) {
    $jobtitle = $_POST["jtitle"];
    $jobdescription = $_POST["description"];
    $jobbudget = $_POST["budget"];
    $jobtype = $_POST["jobtype"];

    // Fetch userid from the database
    $userid = $_SESSION['user_id'];
    $fetchUser = $conn->query("SELECT username FROM register WHERE userid = $userid");
    $userData = $fetchUser->fetch_assoc();

    if ($userData) {
        // Use the fetched userid to insert into the job table
        $sql = "INSERT INTO job (jobtitle, description, type, budget, username,userid) 
                VALUES ('$jobtitle', '$jobdescription', '$jobtype', '$jobbudget', '$userData[username]','$userid')";

        if ($conn->query($sql) === TRUE) {
            echo '<script> alert("Job inserted"); </script>';
            header('Location:post a job.php');
            
        } else {
            echo '<script> alert("Job not inserted"); </script>';
        }
    } else {
        echo '<script> alert("User data not found"); </script>';
    }
}

$conn->close();
?>
