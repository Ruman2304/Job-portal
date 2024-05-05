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
        .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        background-color:black ;
        }
        .card {

        
        font-weight: 400;
        font-family: 'Poppins', sans-serif;
        margin-right: 50px;
        margin-top: 50px;
        width: 200px;
        height: 200px;
        background-color: #f1f1f1;
        padding: 20px;
        margin-bottom: 20px;
        text-align: center;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        border-radius: 20px;
        
        
        }

        .card:hover {
    box-shadow: 0 8px 5px 8px rgba(211, 68, 255, 0.5);
    background-color:#01FF8F; /* #D344FF color in RGBA format */
}

        .card img {
        width: 100px;
        height: 100px;
        }

        .card h2 {
        margin-top: 10px;
        font-size: 22px;
        }
</style>

        

    </head>
    <body>
   <?php include("nav.php");?>




           
            
<!-- Add the search bar below the navigation -->
<input type="text" placeholder="Search jobs..." id="search-bar">
                        <div class="card-container">
                        <a href="documentation.php">
                        <div class="card">
                            <img src="images/folders.png" alt="Image 4">
                            <h3>Documentation</h3></a>
                           
                        </div>
                         <a href="coding.php"> <div class="card">
                            <img src="images/web-programming.png" alt="Image 5">
                            <h3>Coding</h3></a>
                            
                          </div>
                          <a href="research.php">
                          <div class="card">
                            <img src="images/research.png" alt="Image 6">
                            <h3>Research</h3></a>
                          </div>
                          <a href="freelance.php">
                            <div class="card">
                              <img src="images/working.png" alt="Image 6">
                              <h3>Freelance</h3></a>
                           
                          </div>
                          <a href="other.php">
                          <div class="card">
                              <img src="images/interview.png" alt="Image 6">
                              <h3>Other</h3></a>
                           
                          </div>
                        </div>


                </body>

            </html>
    