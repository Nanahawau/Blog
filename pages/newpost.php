<!DOCTYPE html>
<html>
<head>
    <title></title>

</head>
<body>
<?php
include_once "navbar.php";
include_once "database.php";
?>
<div>
    <form method = "POST" action ="process.php"><br><br>
        <h3>New Post</h3><br>
        <label for = "Title"><B>Title</B></label><br>
        <input type="text" name="title"placeholder="Title"><br><br>
        <label for = "Title"><B>Body</B></label><br>
        <textarea name="body" rows="10" cols = "100" placeholder="Write Blogpost Here"></textarea><br><br>
        <button class="btn btn-primary" name="Post">Post</button>
    </form>
    <br>
</div>
</body>
</html>