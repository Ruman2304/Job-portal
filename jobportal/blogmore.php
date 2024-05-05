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
#form{
    color:#FC2947;
    margin-left: 20%;
    margin-top: 20px;
   font-family: 'Nunito Sans', sans-serif; 
   font-weight: 500;
   font-size: 30px;
   padding: 30px 30px 30px 30px;
  }
  input[type=text], select,textarea {
    width: 70%;
    padding: 12px 20px;
    background-color: #000000;
    margin: 8px 0;
    color: aliceblue;
    font-family:'Nunito Sans', sans-serif ;
    display: inline-block;
    font-size: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  input[type=text], select :hover{
    box-shadow: #00FF9F;
  }
  input[type=submit] {
    width: 100%;
    background-color: #793FDF;
    color: rgb(4, 4, 4);
    padding: 14px 20px;
    font-family: 'Poppins', sans-serif;
    border: 2px solid;
    margin: 15px 0;
    border-width: 2px;
    border-color: rgb(255, 255, 255);
    border-radius: 50px;
    width: 200px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }


 
</style>
</head>
<body>
<?php include("nav.php");


include("connection.php");

session_start();
$conn = new mysqli("localhost", "root", "", "jobportaldb");
// Assuming that the blog id is passed as a parameter in the URL
if (isset($_GET['blogid'])) {
    $blogId = $_GET['blogid'];

    // Fetch the detailed information of the selected blog from the 'blog' table
    $sql = "SELECT * FROM blog WHERE blogid = $blogId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display detailed information of the blog with white text color
        echo '<div class="blog-details" style="color: white; text-align:center">';
        echo '<h2 class="blog-header">Title: ' . htmlspecialchars($row["title"]) . '</h2>';
        echo '<p><strong>ID:</strong> ' . htmlspecialchars($row["blogid"]) . '</p>';
        echo '<p><strong>Author:</strong> ' . htmlspecialchars($row["author"]) . '</p>';
        echo '<p><strong>Likes:</strong> ' . htmlspecialchars($row["likes"]) . '</p>';  echo '<a href="userdata.php?username=' . $row['username'] . '"><p style="color:red;"><strong>Posted By:</strong> ' . $row['username'] . '</p></a>';
        echo '<p style="padding:25px;">' . htmlspecialchars($row["blogdescription"]) . '</p>';
        echo '</div>';
    } else {
        echo '<p style="color: white;">Blog not found.</p>';
    }
} else {
    echo '<p style="color: white;">Invalid request. Please provide a valid blog id.</p>';
}
?>
 <form id="commentForm">
        <p style="color: aliceblue;">Comment</p><br>
        <input type="text" id="comment" name="comment" placeholder="Write comment here>>>>"><br>
        <input type="submit" value="SUBMIT" name="comment1">           
    </form>
    


</body>
</html>

