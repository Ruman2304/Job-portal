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
<style>     
    .blog-container {
        border-radius:30px;
            border: 1px solid pink;
            font-family: 'Poppins', sans-serif;
            padding: 15px;
            margin: 30px;
            background-color: #f9f9f9;
        }
    
    
    .blog-header {
            background-color: #D344FF;
            border-radius:20px;
            padding: 10px;
            padding-left:30px;
            font-weight: bold;
            font-size:20px;
        }
</style>

       
</style>
    </head>
    <body>
   <?php include("nav.php");?>
 
            
<!-- Add the search bar below the navigation -->

<body>


<?php
// Start or resume the session
session_start();

// Assuming the session has already started
// ...

// Fetch and display blogs from the database
$conn = new mysqli("localhost", "root", "", "jobportaldb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch blogs from the 'blog' table
$result = $conn->query("SELECT * FROM blog");

if ($result->num_rows > 0) {
    // Loop through each blog entry
    while ($row = $result->fetch_assoc()) {
        $blogId = $row["blogid"];

        // Check if the user has already liked this blog
        $userLiked = isset($_SESSION['liked_blogs'][$blogId]) && $_SESSION['liked_blogs'][$blogId];

        echo '<div class="blog-container">';
        echo '<h2 class="blog-header">Title: ' . htmlspecialchars($row["title"]) . '</h2>';
        echo '<p><strong>Author:</strong> ' . htmlspecialchars($row["author"]) . '</p>';
        echo '<p><strong>Likes:</strong> <span id="like_count_' . $blogId . '">' . htmlspecialchars($row["likes"]) . '</span></p>';
       
        echo '<a href="userdata.php?username=' . $row['username'] . '"><p style="color:red;"><strong>Posted By:</strong> ' . $row['username'] . '</p></a>';
      //  echo '<p><strong>Description:</strong> ' . htmlspecialchars($row["blogdescription"]) . '</p>';
        echo '<a href="blogmore.php?blogid=' . $row['blogid'] . '"><p style="color:red;"><strong>More>>>>></strong> </p></a>';

        // Display "Like" button based on whether the user has already liked the blog
        if ($userLiked) {
            echo '<button class="like-button liked" onclick="unlikeBlog(' . $blogId . ')">&#10084;</button>';
        } else {
            echo '<button class="like-button" onclick="likeBlog(' . $blogId . ')">&#10084;</button>';
        }

        echo '</div>';
    }
} else {
    echo '<p>No blogs found.</p>';
}

$conn->close();
?>
<style>
  .like-button {
    background-color: transparent;
    border: none;
    cursor: pointer;
    outline: none;
    font-size: 24px;
  }

  .like-button.liked {
    color: white; /* White color for liked button */
    background-color: red; /* Red background for liked button */
  }
</style>

<script>
function likeBlog(blogId) {
    // AJAX request to update likes count in the database
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Update likes count in the UI
            var likeCountElement = document.getElementById('like_count_' + blogId);
            likeCountElement.innerHTML = this.responseText;

            // Mark the blog as liked in the session
            markBlogAsLiked(blogId);
        }
    };

    xmlhttp.open("GET", "like_blog.php?blogId=" + blogId, true);
    xmlhttp.send();
}

function unlikeBlog(blogId) {
    // AJAX request to update likes count in the database
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Update likes count in the UI
            var likeCountElement = document.getElementById('like_count_' + blogId);
            likeCountElement.innerHTML = this.responseText;

            // Mark the blog as unliked in the session
            markBlogAsUnliked(blogId);
        }
    };

    xmlhttp.open("GET", "unlike_blog.php?blogId=" + blogId, true);
    xmlhttp.send();
}

function markBlogAsLiked(blogId) {
    // Mark the blog as liked in the session
    if (!Array.isArray(sessionStorage['liked_blogs'])) {
        sessionStorage['liked_blogs'] = [];
    }

    sessionStorage['liked_blogs'][blogId] = true;
}

function markBlogAsUnliked(blogId) {
    // Mark the blog as unliked in the session
    if (!Array.isArray(sessionStorage['liked_blogs'])) {
        sessionStorage['liked_blogs'] = [];
    }

    sessionStorage['liked_blogs'][blogId] = false;
}
</script>



</body>
</html>