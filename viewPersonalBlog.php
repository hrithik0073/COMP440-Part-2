<?php 
session_start();
//connect db
include 'db_connect.php';
//got blog id
$personalBlogId =  $_GET['pbid'];

$sql = "SELECT * FROM blogs WHERE blogid = '$personalBlogId';" ;
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($result);

$tagSQL = "SELECT tag FROM blogstags WHERE blogid = '$personalBlogId';" ;
$tagResult = mysqli_query($conn, $tagSQL);

$commentSQL = "SELECT `description`, `posted_by` FROM comments WHERE blogid = '$personalBlogId';" ;
$commentResult = mysqli_query($conn, $commentSQL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post your Blog</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/dcda13a2c7.js" crossorigin="anonymous"></script>
</head>
<body>
<nav>
        <div class="inline">
          <i class="fas fa-database fa-2x"></i>
          <h1>COMP 440 Phase 1 Team#20</h1>
          <div class="Right">
            <a class="hover" href="home.php">Home</a>
            <a class="hover" href="postBlog.php">Post Blog</a>
            <a class="hover" href="postComment.php"> Comment</a>
            <a class="hover" href="logout.php">Logout</a>
          </div>
        </div>
    </nav>
    <div class="displayInline" style="margin-top: 30px;">
      <div class="viewBlog">
        <h1> Blog posted on <?php echo $rows['pdate']; ?> <h1>
        <h2> Subject </h2>
        <p> <?php echo $rows['subject']; ?> </p>
        <h2> Description </h2>
        <p> <?php echo $rows['description']; ?> </p>
        <h2> Tags </h2>
        <ul>
        <?php 
            while($tagRow = mysqli_fetch_array($tagResult)){
                echo "<li>" .$tagRow['tag']. "</li>";
            }
        ?>
        </ul>
        <h2> Comments </h2>
        <ul>
        <?php
            while($commentRow = mysqli_fetch_array($commentResult)){
                echo "<li>" .$commentRow['description']. " (posted by: " .$commentRow['posted_by']. ")</li>";
            }
        ?>
        </ul>
      </div>
    </div>
    </body>
    </html>