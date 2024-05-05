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

 
</style>
</head>
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "jobportaldb");

if(isset($_SESSION['user_id'])){
    $sql = "SELECT * FROM register WHERE userid=" . $_SESSION['user_id'];
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}


/*update*/
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    // Retrieve updated data from the form
    $newUsername = $_POST["newUsername"];
    $newPassword = $_POST["newPassword"];
    $newEmail = $_POST["newEmail"];
    $newGender = $_POST["newGender"];

    // Update user data in the database
    $updateSql = "UPDATE register SET username='$newUsername', password='$newPassword', email='$newEmail', gender='$newGender' WHERE userid=" . $_SESSION['user_id'];
    $updateSql1 = "UPDATE job SET username='$newUsername' WHERE userid=" . $_SESSION['user_id'];
    $updateSql2 = "UPDATE blog SET username='$newUsername' WHERE userid=" . $_SESSION['user_id'];
    $conn->query($updateSql);
    $conn->query($updateSql1);
    $conn->query($updateSql2);
    
   

    // Reload user data after update
    $sql = "SELECT * FROM register WHERE userid=" . $_SESSION['user_id'];
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      

        table {
            border: 2px solid #FBECB2; 
            padding:5px;
            border-radius:15px;
            margin:50px auto;
        
        }
        td {
            border: 2px solid #D344FF;
            border-radius:10px;          
            padding: 10px;
            color: white;
        }
        .explore{
    border-radius: 30px ;
    background-color: #D344FF;
    color: white;
    font-size: 15px;
    box-shadow: 0 4px 8px 0 rgba(8, 8, 8, 0.933), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    font-family: 'Poppins', sans-serif;
    height: 50px;
    width: 150px;
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
    <title>User Account</title>
</head>
<body>

  <?php include("nav.php");?>


<table style=" font-family: 'Poppins', sans-serif; width:30%;">
<tr> <td colspan=2 style="align:center;  font-size: 25px;padding: 20px;text-align: center;">User Data</td></tr>
    <tr>
        <td>Username:</td>
        <td><?php echo $row['username']; ?></td>
    </tr>
    <tr>
        <td>Password:</td>
        <td><?php echo $row['password']; ?></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><?php echo $row['email']; ?></td>
    </tr>
    <tr>
        <td>Gender:</td>
        <td><?php echo $row['gender']; ?></td>
    </tr>
</table>
<form action="useraccount.php" method="post">
    <table style="font-family: 'Poppins', sans-serif; width:30%;">
    <tr> <td colspan=2 style="font-size: 25px; padding: 20px; text-align: center;">Update User Data</td></tr>

        <tr>
            <td>Username:</td>
            <td><input type="text" name="newUsername" value="<?php echo $row['username']; ?>" required></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="newPassword" value="<?php echo $row['password']; ?>" required></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="newEmail" value="<?php echo $row['email']; ?>" required></td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td>
                <select name="newGender" required>
                    <option value="Male" <?php echo ($row['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo ($row['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;"><button type="submit" name="update" class="explore">Update</button></td>
        </tr>
    </table>
</form>


<?php
$conn = new mysqli("localhost", "root", "", "jobportaldb");


// Fetch username from the database
$unameQuery = "SELECT username FROM register WHERE userid=" . $_SESSION['user_id'];
$result = $conn->query($unameQuery);
if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
    $username = $userData['username'];

    // Fetch all jobs associated with the user
    $allJobsSql = "SELECT * FROM job WHERE username='$username'";
    $allJobsResult = $conn->query($allJobsSql);

    // Check if there are any jobs
    if ($allJobsResult->num_rows > 0) {
        // Output data of each job in a table row
        echo '<table style="font-family: \'Poppins\', sans-serif; width:80%; margin: 20px auto; ">';
        echo '<tr><td colspan="6" style="font-size: 25px; padding: 20px; text-align: center;" id="blogtable">Jobs You Posted</td></tr>';
        echo '<tr>';
        echo '<td>Job ID</td>';
        echo '<td>Job Title</td>';
        echo '<td>Description</td>';
        echo '<td>Type</td>';
        echo '<td>Budget</td>';
        echo '<td>Action</td>';
        echo '</tr>';

        while ($jobRow = $allJobsResult->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $jobRow['jobid'] . '</td>';
            echo '<td>' . $jobRow['jobtitle'] . '</td>';
            echo '<td>' . $jobRow['description'] . '</td>';
            echo '<td>' . $jobRow['type'] . '</td>';
            echo '<td>' . $jobRow['budget'] . '</td>';
            echo '<td><form method="post"><input type="hidden" name="deleteJobId" value="' . $jobRow['jobid'] . '"><button type="submit" name="deleteJob" style="background-color: #D344FF; color: white; border: none; padding: 8px 12px; border-radius: 5px; cursor: pointer;">Delete</button></form></td>';
            echo '</tr>';
        }

        echo '</table>';

        // Display applications in a separate table
        $applySql = "SELECT * FROM apply WHERE jobid IN (SELECT jobid FROM job WHERE username='$username')";
        $applyResult = $conn->query($applySql);

        if ($applyResult->num_rows > 0) {
            echo '<table style="font-family: \'Poppins\', sans-serif; width:80%; margin: 20px auto; ">';
            echo '<tr><td colspan="2" style="font-size: 25px; padding: 20px; text-align: center;" id="blogtable">Applications</td></tr>';
            echo '<tr>';
            echo '<td>Applicant Username</td>';
            echo '<td>Job ID</td>';
            echo '</tr>';
            while ($applyRow = $applyResult->fetch_assoc()) {
                echo '<tr>';
                echo '<td><a href="userdata.php?username=' . $applyRow['username'] . '"><p style="color:red;">' . $applyRow['username'] . '</p></a></td>';
                echo '<td>' . $applyRow['jobid'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No applications found.</p>';
        }
    } else {
        echo '<p>No jobs found.</p>';
    }
} else {
    echo '<p>User not found.</p>';
}
?>

<?php
// Check if the delete form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteJob"])) {
    $deleteJobId = $_POST["deleteJobId"];

    // Delete job from the database
    $deleteJobSql = "DELETE FROM job WHERE jobid=" . $deleteJobId;
    $conn->query($deleteJobSql);
}
?>
<?php
$conn = new mysqli("localhost", "root", "", "jobportaldb");

// Fetch username from the database
$unameQuery = "SELECT username FROM register WHERE userid=" . $_SESSION['user_id'];
$result = $conn->query($unameQuery);

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
    $username = $userData['username'];

    // Fetch all blogs associated with the user
    $allblogsSql = "SELECT * FROM blog WHERE username='$username'";
    $allblogResult = $conn->query($allblogsSql);

    // Check if there are any blogs
    if ($allblogResult->num_rows > 0) {
        // Output data of each blog in a table row
        echo '<table style="font-family: \'Poppins\', sans-serif; width:80%; margin: 20px auto; ">';
        echo '<tr><td colspan="6" style="font-size: 25px; padding: 20px; text-align: center;" id="blogtable">Blogs You Posted</td></tr>';
        echo '<tr>';
        echo '<td>Blog ID</td>';
        echo '<td>Title</td>';
        echo '<td>Blog Description</td>';
        echo '<td>Author</td>';
        echo '<td>Username</td>';
        echo '<td>Action</td>'; // Added a column for action
        echo '</tr>';

        while ($Row = $allblogResult->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $Row['blogid'] . '</td>';
            echo '<td>' . $Row['title'] . '</td>';
            echo '<td>' . $Row['blogdescription'] . '</td>';
            echo '<td>' . $Row['author'] . '</td>';
            echo '<td>' . $Row['username'] . '</td>';
            echo '<td><form method="post"><input type="hidden" name="deleteBlogId" value="' . $Row['blogid'] . '"><button type="submit" name="deleteBlog" style="background-color: #D344FF; color: white; border: none; padding: 8px 12px; border-radius: 5px; cursor: pointer;">Delete</button></form></td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>No blogs found.</p>';
    }
} else {
    echo '<p>User not found.</p>';
}

// Check if the delete form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteBlog"])) {
    $deleteBlogId = $_POST["deleteBlogId"];

    // Delete blog from the database
    $deleteBlogSql = "DELETE FROM blog WHERE blogid=" . $deleteBlogId;
    $conn->query($deleteBlogSql);
}
?>
</body>
</html>



       
 