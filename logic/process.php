<?php

include 'autoload.php';

//Check if it is a post request
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $_SESSION['post'] = $_POST;

    //Initialize variables
    $title = $_POST['title'];
    $body = addslashes($_POST['body']);
    $_error = [];

    if (empty($title) ) {
        $_error = "Title is empty";
    }

    if (empty($body)) {

        $_error = "Body is empty";
    }

    if (count($_error) > 0) {

        $_SESSION['errors'] = $_error;
    }
}

$user_id = auth("id");

//insert into database
$sql = "INSERT INTO posts (user_id, title,body,created_at, updated_at) VALUES('$user_id','$title','$body', now(), now())";

$result = $conn->query($sql);

if($conn->error){
    echo $conn->error;
    die();
}

$url = url('blogpost');
redirect($url);