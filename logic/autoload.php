<?php
session_start();

require_once 'functions.php';
require_once 'database.php';

// Error bag
$errors = $_SESSION['errors'] ?? [];
$blogpost = $_SESSION['blogpost']??[];