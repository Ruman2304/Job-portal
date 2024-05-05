<?php
session_start();
$conn = new mysqli("localhost", "root", "", "jobportaldb");

// Check if the request contains the required parameters
if (isset($_POST['username']) && isset($_POST['jobid'])) {
    // Sanitize and validate input data
    $username = $conn->real_escape_string($_POST['username']);
    $jobid = $conn->real_escape_string($_POST['jobid']);

    // Insert data into the apply table
    $sql = "INSERT INTO apply (username, jobid) VALUES ('$username', '$jobid')";
    if ($conn->query($sql) === TRUE) {
        echo "Application submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: Missing parameters.";
}
?>
