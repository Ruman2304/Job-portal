<?php
   $servername = "localhost";  
   $database = "jobportaldb";

   $conn = new mysqli($servername, "root", "", $database);

   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
// Check if the form is submitted
    // Collect form data
    $username = $_POST["uname"];
    $password = $_POST["psw"];
    $confirm_password = $_POST["csw"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    // Check if passwords match
    if ($password != $confirm_password) {
        die("Error: Passwords do not match.");
    }
    $check_stmt = $conn->prepare("SELECT * FROM register WHERE username = ? OR email = ?");
    $check_stmt->bind_param("ss", $username, $email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        die("Error: Username or email already exists.");
    }

  #  $maxFileSize = 2 * 1024 * 1024; // 2 MB
   # if ($_FILES["file"]["size"] > $maxFileSize) {
    #    die("Error: File size exceeds 2MB.");
    #}

    // Move uploaded file to a desired directory
    //$uploadDirectory = "uploads/";
    //$uploadedFile = $uploadDirectory . basename($_FILES["file"]["name"]);

    //if (!move_uploaded_file($_FILES["file"]["tmp_name"], $uploadedFile)) {
      //  die("Error: Failed to upload file.");
    //}

    // Insert data into the database (Assuming you have a MySQL connection)
 

    $sql = "INSERT INTO register (username, password, email, gender ) VALUES ('$username', '$password', '$email', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo'<script> alert("data inserted"); </script>';
        header("Location: login.php");
    } else {
        echo'<script> alert("data not inserted"); </script>';
    }


?>