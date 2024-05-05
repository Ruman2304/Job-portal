<!DOCTYPE html>
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
form {
    border: 3px solid #000000;
color: #f1f1f1;
font-family: 'Nunito Sans', sans-serif;
margin: 7% 0 0 40%;}

input[type=text], input[type=password] {
  width: 300px;
  padding: 12px 20px;
  margin: 8px 0;
  color: #f1f1f1;
  background-color: #000000;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
    border-radius: 30px ;
    background: rgb(131,46,255);
background: linear-gradient(90deg, rgba(131,46,255,1) 35%, rgba(254,79,242,1) 98%);
    color: white;
    font-size: 15px;
    box-shadow: 0 4px 8px 0 rgba(8, 8, 8, 0.933), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    font-family: 'Poppins', sans-serif;
    height: 40px;
    width: 120px;
    border: 2px solid;
    border-color: #01FF8F;
    font-weight: 500;
}

button:hover {
    background: #00FF9F;
    border-color: rgb(255, 255, 255);
    color:black;
}






.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
/*nav bar*/
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

</style>
</head>
<body>
  <?php
  session_start();
  ?>
   <nav>
    <label class="logo">JOB PORTAL</label>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        
        <?php 
        if (isset($_SESSION['user_id'])) {
            echo '<li><a href="post a job.php">Post a Job</a></li>';
            echo '<li><a href="post a blog.php">Post a Blog</a></li>';
            echo '<li><a href="search a job.php">Search a Job</a></li>';
            echo '<li><a href="">Blogs</a></li>';
            echo '<li><a href="useraccount.php">User Account</a></li>';
            echo '<li><a href="logout.php">Log out</a></li>';
        } else {
            echo '<li><a href="search a job.php">Search a Job</a></li>';
            echo '<li><a href="">Blogs</a></li>';
            echo '<li><a href="login.php">Login</a></li>';
        }
        ?>
    </ul>
</nav>

     



<form action="login1.php" method="post">
  <div class="imgcontainer">
    <img src="images/man.png" alt="Avatar" class="avatar">
  </div>

  <h2 style="color: #f1f1f1;">Login Form</h2>

  <div class="container">
    <label for="uname"><b>Username</b></label><br>
    <input type="text" placeholder="Enter Username" name="uname" required><br>

    <label for="psw"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="psw" required><br>
        
    <a href="home.html"><button type="submit" name="submit">Login</button></a><br>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label><br><br>
    <a href="register.php" style="color: aliceblue; text-decoration: underline;"><label>Not register yet! Click here</label></a>
  </div>


  </div>
</form>

</body>
</html>