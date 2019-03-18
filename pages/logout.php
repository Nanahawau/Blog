<?php
include '../logic/autoload.php';

unset($_SESSION['auth']);

redirect(url('login'));