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

        

    </head>
    <body>
   
        
        <?php include("nav.php");?>


    
            <form id="form"action="post a blog1.php" method="post">
                <p style="color: aliceblue;">Post a Blog</p><br>
                <label for="fname">Blog Title</label><br>
                <input type="text" id="jtitle" name="bname" placeholder="Write Job Title here>>>>" required><br>
            
                <label for="lname">Description</label><br>
            
                <textarea id="subject" name="blogdescription" placeholder="Write Description here>>>>" style="height:200px" required></textarea><br>
            
                <label for="Budget">Author Name</label><br>
                <input type="text" id="Budget" name="author" placeholder="author name here>>>>" required><br>
                <label for="Budget">Upload Photo</label>
                <input type="file" id="myFile"name="filename">
                <br>
                <input type="submit" value="SUBMIT" text="SUBMIT">
                
                
              </form>
    </body>
</html>
