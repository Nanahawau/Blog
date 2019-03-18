<?php
//including dependencies
include "autoload.php";


if (isset($_POST)) {

    $_SESSION['post'] = $_POST;

    $_error = [];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    // Validation
    if (empty($fullname)) {
        $_error['fullname'] = "Full name is required";
    }

    if (empty($email)) {
        $_error['email'] = "Email is required";
    }

    if (empty($password)) {
        $_error['password'] = "Password is required";
    }

    //Redirect if validation fails

    if (count($_error) > 0) {

        $_SESSION['errors'] = $_error;
        $url = url('signup');
        redirect($url);
    }

    //check if a user is unique
    $password = md5($password);
    $sql = ("SELECT * FROM users WHERE email = '$email'");
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        $_SESSION['errors'] = [
            'signup' => "User already exists"
        ];
        $url = url('signup');
        redirect($url);

    } else {
        $sql = "INSERT INTO users (fullname, email, password) VALUES('$fullname', '$email', '$password')";
        $conn->query($sql);

        $_SESSION['auth'] = [
            'name' => $fullname,
            'email' => $email
        ];

        $url = url('blogpost');

        redirect($url);

    }
}