<?php
session_start();
if(isset($_SESSION['user_id'])){    
}  
?>

<html>
    <head > <link rel="stylesheet" href="home.css">
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

.container {
  padding: 64px;
  color:white;
}

.row:after {
  content: "";
  display: table;
  clear: both
}

.column-66 {
  float: left;
  width: 66.66666%;
  padding: 20px;
}

.column-33 {
  float: left;
  width: 33.33333%;
  padding: 20px;
}

.large-font {
  font-size: 48px;
}

.xlarge-font {
  font-size: 64px
}

.button {
  border: none;
  color: black;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  background-color: #00FF9F;
  border-radius:30px;
}

img {
  display: block;
  height: auto;
  max-width: 100%;
}

@media screen and (max-width: 1000px) {
  .column-66,
  .column-33 {
    width: 100%;
    text-align: center;
  }
  img {
    margin: auto;
  }
}
</style>
        
</head>
        <body>
        <?php include("nav.php");?>
<div style="background-color:#D344FF;margin-top:100px;margin-left:33%;width:500px;border-radius:30px; padding:20px;">
<h1 style="color:white ;text-align:center;">No Of Jobs We Provided</h1>
    <p id="counter" style="color:white;font-size:50px ;text-align:center">0</p>
    <script>
        var startTime = Date.now();
        var duration = 4000; // 4 seconds in milliseconds
        var startNumber = 1;
        var endNumber = 631;

        function incrementCounter() {
            var elapsedTime = Date.now() - startTime;

            if (elapsedTime < duration) {
                var counterElement = document.getElementById('counter');
                var currentCount = parseInt(counterElement.innerText, 10);
                var newCount = currentCount + 1;

                if (newCount <= endNumber) {
                    counterElement.innerText = newCount;
                } else {
                    counterElement.innerText = endNumber;
                    clearInterval(counterInterval);
                }
            } else {
                clearInterval(counterInterval);
            }
        }

        var counterInterval = setInterval(incrementCounter, 5); // Milliseconds between increments
    </script>
    </div>




<!-- The App Section -->
<div class="container">
  <div class="row">
    <div class="column-66">
      <h1 class="xlarge-font"><b>The Website</b></h1>
      
      <p><span style="font-size:36px">What Is JobPortal?</span>

      "Welcome to our Job Portal, a catalyst for career success. We are committed to connecting talents with opportunities, fostering innovation, and simplifying the job search process. Empowering individuals and businesses alike, we redefine the way people find and build fulfilling careers. Join us on this transformative journey toward professional excellence."</p>
     <a href="Home.php"> <button class="button" style="border-radius:30px">Get Started!</button></a>
    </div>
    <div class="column-33">
        <img src="images/job.png" width="335" height="471">
    </div>
  </div>
</div>

<!-- Clarity Section -->
<div class="container" style="background-color:black">
  <div class="row">
    <div class="column-33">
      <img src="images/social-media.png" alt="App" width="335" height="471">
    </div>
    <div class="column-66">
      <h1 class="xlarge-font"><b>Be A Writer!</b></h1>
      <h1 class="large-font" style="color:red;"><b>Post Blogs.</b></h1>
      <p><span style="font-size:24px">A revolution in resolution.</span> 
"Dive into insightful blogs on our Job Portal, your go-to resource for career guidance. Explore expert advice, industry trends, and tips to navigate the job market. Stay informed, inspired, and ready for success. Empower your career journey with our curated content, designed for job seekers and professionals alike."</p>
      <button class="button" style="background-color:red">Read More</button>
    </div>
  </div>
</div>

<!-- The App Section -->
<div class="container">
  <div class="row">
    <div class="column-66">
      <h1 class="xlarge-font"><b>Find JObs</b></h1>
     
      <p><span style="font-size:36px">Find Your Dream Job.</span> 
"Discover your dream job effortlessly with our JobPortal! We streamline your job search, offering a user-friendly platform that connects you with the perfect opportunities. Explore diverse industries, filter by preferences, and land your ideal job quickly. Your career journey starts here, simplified for success!"




</p>
<a href="search a job.php"> <button class="button" style="border-radius:30px">Find Jobs That Are Suitable For You</button></a>
    </div>
    <div class="column-33">
        <img src="images/group.png" width="335" height="471" >
    </div>
  </div>
</div>

    </body>
    </html>