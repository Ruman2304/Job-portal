<?php
session_start();
if(isset($_SESSION['user_id'])){    
}  
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300&family=Sometype+Mono&display=swap" rel="stylesheet">
<style>
body {
    background-color: #000000;
    font-family: Arial, Helvetica, sans-serif;}
    *{
    list-style: none;  
    text-decoration: none;   
}
   nav ul {
    float: right;
    overflow: hidden;
    list-style: none;
    margin-right: 100px;
   
    }
    nav li :hover {
      background-color: #D344FF;
      color: rgb(0, 0, 0);
      box-shadow: yellow;
    }
  
  li  {
    display: inline-block;
    padding: 8px;
    background: transparent;
    margin: 0 20px;
    font-family: 'Poppins', sans-serif;
  }
  nav a{
    color: rgb(250, 250, 250);
    font-size: 18px;
    padding: 10px;
    border-radius: 50px;
  }
  label.logo{
    padding:  0 75px;
    margin-top: 30px;
    font-size: 35px;
    color: rgb(255, 255, 255);
    font-family: 'Poppins', sans-serif;
  }
  .logo:hover{
    color: #01FF8F;
  }
  table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px;
            color:white;
            margin-top: 10%;
            margin-left:25%;
            font-family: 'Poppins', sans-serif;

        }

        table, th, td {
            border: 1px solid #ffffff; /* Set border color to white */
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
 
</style>
</head>
<body>
<?php include("nav.php");?>

<?php
include("connection.php");

session_start();
$conn = new mysqli("localhost", "root", "", "jobportaldb");

// Check if the username parameter is set
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Fetch user data based on the username
    $userDataResult = $conn->query("SELECT * FROM register WHERE username = '$username'");

    // Check if user data is found
    if ($userDataResult->num_rows > 0) {
        // Output user data in a table
        echo '<table>';
        while ($userData = $userDataResult->fetch_assoc()) {
            echo'<tr><td colspan="2" style="font-size:20px;"><strong>Job Posted By</strong></td>';
            
            echo '<tr><td><strong>Username:</strong></td><td>' . $userData['username'] . '</td></tr>';
            echo '<tr><td><strong>Email:</strong></td><td>' . $userData['email'] . '</td></tr>';
            // Add more fields as needed
        }
        echo '</table>';
    } else {
        echo 'User not found.';
    }
} else {
    echo 'Invalid request. Please provide a username.';
}
?>

