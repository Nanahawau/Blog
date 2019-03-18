<?php
include "autoload.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $_SESSION['post'] = $_POST;

    // Declare variables
    $_error = [];
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Input field validation
    if (empty($email)) {
        $_error['email'] = "Email is required";
    }

    if (empty($password)) {
        $_error['password'] = "Password is required";
    }

    // Redirect if validation fails
    if (count($_error) > 0) {
        $_SESSION['errors'] = $_error;
        $url = url('login');

        redirect($url);
    }

    // Check existence
    $password = md5($password);
    $checkUser = "SELECT * FROM users where email = '$email' and password = '$password' LIMIT 1";
    $result = $conn->query($checkUser);

    // Validate Existence
    if ($result->num_rows < 1) {
        $_SESSION['errors'] = [
            'login' => 'Incorrect username or password'
        ];

        $url = url('login');

        redirect($url);
    }

    // Save result in session and redirect to dashboard
    $user = $result->fetch_assoc();

    unset($user['password']);

    $_SESSION['auth'] = $user;

    $url = url('blogpost');

    redirect($url);
}