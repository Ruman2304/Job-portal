
<html>
    <head > <link rel="stylesheet" href="nav.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300&family=Sometype+Mono&display=swap" rel="stylesheet">
<style>
* {
  box-sizing:border-box;
}

body {
  margin: 0;
 
  font-family: 'Poppins', sans-serif;
}
<style>
/* Add this CSS in your stylesheet or in the head of your HTML document */
.dropdown {
    display: inline-block; 
}
.dropbtn{
    border:1px solid white;
    padding:3px;
    border-radius:5px;
    
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: black;
    border:1px solid white;
    padding:3px;
    border-radius:5px;
    
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    color:white;
}

.dropdown-content a:hover {
    background-color: #D344FF;
    color: white;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>

</style>
        
</head>
        <body>
        <nav>
    <label class="logo">JOB PORTAL</label>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>

        <?php 
        if (isset($_SESSION['user_id'])) {
            echo '<li><a href="post a job.php">Post a Job</a></li>';
            echo '<li><a href="search a job.php">Search a Job</a></li>';
            echo '<li><a href="blog.php">Blogs</a></li>';
            echo '<li class="dropdown">';
            echo '<a href="#" class="dropbtn">More<img src="images/down.jpg" alt="Image" style="margin:4px;width: 20px; height: 20px; float: right;"></a>';
            echo '<div class="dropdown-content">';          
            
            echo '<a href="post a blog.php">Post a Blog</a>';
            echo '<a href="useraccount.php">User Account</a>';
            echo '<a href="logout.php">Logout</a>';
            echo '</div>';
            echo '</li>';
        } else {
            echo '<li><a href="search a job.php">Search a Job</a></li>';
            echo '<a href="login.php">Login</a>';
            echo '<li class="dropdown">';
            echo '<a href="#" class="dropbtn">More<img src="images/down.jpg" alt="Image" style="margin:4px;width: 20px; height: 20px; float: right;"></a>';
            echo '<div class="dropdown-content">';
            echo '<a href="#">Blogs</a>';   
            echo '</div>';
            echo '</li>';
        }
        ?>
    </ul>
</nav>


