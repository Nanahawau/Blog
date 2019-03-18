<?php

/**
 * Build a url that follows our present domain name (example.com/...)
 *
 * @param $route
 * @return string
 */
function url($route)
{
    $protocol = "http";

    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $protocol .= "s";
    }

    $host = "$protocol://" . $_SERVER['HTTP_HOST'] . '/pages';

    return "$host/$route.php";
}

/**
 * Redirects to route
 *
 * @param $route
 */
function redirect($route)
{
    header("Location:$route");
    die();
}

/**
 * Returns previous value of request field
 *
 * @param $key
 * @param null $default
 * @return null
 */
function old($key, $default = null)
{
    return $_SESSION['post'][$key] ?? $default;
}

function auth($key)
{
    return $_SESSION['auth'][$key] ?? false;
}

function currentUrl()
{
    $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    if ($_SERVER['QUERY_STRING']) {
        $url .= "?" . $_SERVER['QUERY_STRING'];
    }

    return $url;
}

function back()
{
    return $_SERVER['HTTP_REFERER'] ?? false;
}

