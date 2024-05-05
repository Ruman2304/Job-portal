<?php
session_start();
if(isset($_SESSION['user_id'])){    
}  
?>
<html>
    <head>
        <link rel="stylesheet" href="home.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300&family=Sometype+Mono&display=swap" rel="stylesheet">
<style>  input[type="text"] {
            width: 30%;
            padding: 10px;
            margin-left: 35%;
            margin-top:20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-image: url('search-icon.png'); /* Add your search icon image */
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding-left: 40px; /* Adjust based on the icon width */
            
        }
        .job-card {
            border-radius:30px;
            border: 1px solid pink;
            font-family: 'Poppins', sans-serif;
            padding: 10px;
            margin: 10px;
            background-color: #f9f9f9;
        }

        .job-card-header {
            background-color: #D344FF;
            border-radius:30px;
            padding: 10px;
            padding-left:30px;
            font-weight: bold;
            font-size:20px;
        }
        .explore{
        border-radius: 30px ;
        background-color: #D344FF;
        color: white;
        font-size: 15px;   
        font-family: 'Poppins', sans-serif;
        height: 40px;
        width: 100px;
        border: 2px solid;
        border-color: #01FF8F;
        font-weight: 500;
         }
        .explore:hover{
        background: #00FF9F;
        border-color: rgb(255, 255, 255);
        color:black;

         }
       
       
</style>
    </head>
    <body>
    <?php include("nav.php");?>




           
            
<!-- Add the search bar below the navigation -->
<input type="text" placeholder="Search jobs..." id="search-bar">
<body>
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "jobportaldb");
// Fetch all jobs from the database
$result = $conn->query("SELECT * FROM job WHERE type = 'freelance'");

// Check if there are any jobs
if ($result->num_rows > 0) {
    // Output data of each row in a card format
    while ($row = $result->fetch_assoc()) {
        echo '<div class="job-card">';
        echo '<div class="job-card-header">Job Title: ' .$row['jobtitle'] . '</div>';
        echo '<p><strong>Job ID:</strong> ' . $row['jobid'] . '</p>';
        echo '<p><strong>Description:</strong> ' . $row['description'] . '</p>';
        echo '<p><strong>Job Type:</strong> ' . $row['type'] . '</p>';
        echo '<p><strong>Budget:</strong> ' . $row['budget'] . '</p>';
        echo '<a href="userdata.php?username=' . $row['username'] . '"><p style="color:red;"><strong>Posted By:</strong> ' . $row['username'] . '</p></a>';

        echo '<button class="explore" onclick="applyForJob(' . $row['jobid'] . ')">Apply</button>'; // Pass jobid to applyForJob function
        echo '</div>';
    }
} else {
    echo 'No jobs found.';
}
?>
<script>
function applyForJob(jobid) {
    var username = "<?php echo $_SESSION['username']; ?>"; // Get the username from PHP session
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "apply.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText); // Alert the response from the server
        }
    };
    xhr.send("username=" + username + "&jobid=" + jobid); // Send username and jobid to the server
}
</script>


</body>
</html>
                </body>
                </html>