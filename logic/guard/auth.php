<?php
// If there is no authenticated user (no id key in session[auth])
if (!auth('id')){
    $url = url('login');
    $url .= "?return=" . urlencode(currentUrl());

    redirect($url);
}