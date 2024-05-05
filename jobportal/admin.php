<h1 style="text-align:center;">
    ADMIN PANEL
</h1>

<?php
// ...
 $servername = "localhost";  
   $database = "jobportaldb";

   $conn = new mysqli($servername, "root", "", $database);
   ?>
   

   

   <h2 style="text-align:center;margin-top:20px">
    USER DATA
</h2>
 
      <table border="1"style="font-family: 'Poppins', sans-serif; width:60%; margin: 20px auto; border-collapse: collapse;">
      <tr>
          <th>User ID</th>
          <th>Username</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Action</th>
      </tr>
      
  
      <?php
      $allUsersSql = "SELECT * FROM register";
      $allUsersResult = $conn->query($allUsersSql);
      // Check if there are any users
      if ($allUsersResult->num_rows > 0) {
          // Output data of each user in a table row
          while ($userRow = $allUsersResult->fetch_assoc()) {
              echo '<tr>';
              echo '<td>' . $userRow['userid'] . '</td>';
              echo '<td>' . $userRow['username'] . '</td>';
              echo '<td>' . $userRow['email'] . '</td>';
              echo '<td>' . $userRow['gender'] . '</td>';
              echo '<td><form method="post"><input type="hidden" name="deleteUserId" value="' . $userRow['userid'] . '"><button type="submit" name="deleteUser" style="background-color: #D344FF; color: white; border: none; padding: 8px 12px; border-radius: 5px; cursor: pointer;">Delete</button></form></td>';
              echo '</tr>';
          }
      } else {
          echo '<tr><td colspan="5">No users found.</td></tr>';
      }
      ?>
  
  </table>
  
  <?php
  // Check if the delete form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteUser"])) {
      $deleteUserId = $_POST["deleteUserId"];
  
      // Delete user from the database
      $deleteSql = "DELETE FROM register WHERE userid=" . $deleteUserId;
      $conn->query($deleteSql);
  
    
      exit();
  }
  ?>
  
  <h2 style="text-align:center;margin-top:20px">
   JOB DATA
</h2>
  <table border="1"style="font-family: 'Poppins', sans-serif; width:80%; margin: 20px auto; border-collapse: collapse;">
  <tr>
      <th>Job ID</th>
      <th>Job Title</th>
      <th>Description</th>
      <th>Type</th>
      <th>Budget</th>
      <th>Action</th>
  </tr>

  <?php
  // Fetch all jobs from the database
  $allJobsSql = "SELECT * FROM job";
  $allJobsResult = $conn->query($allJobsSql);

  // Check if there are any jobs
  if ($allJobsResult->num_rows > 0) {
      // Output data of each job in a table row
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
  } else {
      echo '<tr><td colspan="6">No jobs found.</td></tr>';
  }
  ?>

</table>

<?php
// Check if the delete form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteJob"])) {
  $deleteJobId = $_POST["deleteJobId"];

  // Delete job from the database
  $deleteJobSql = "DELETE FROM job WHERE jobid=" . $deleteJobId;
  $conn->query($deleteJobSql);


  exit();
}

// ...
?>
<a href="logout.php"><button style="height:50px;width:150px;font-size:30px; dispaly:flex;align:center;">logout</button></a>


   
 
