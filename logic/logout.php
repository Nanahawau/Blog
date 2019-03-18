<?php
session_destroy();

$url = url('index');
redirect($url);