<?php

function getParameter($key, $default = '')
{
    if (!empty($_REQUEST[$key])) {
        return $_REQUEST[$key];
    }
    return $default;
}

function getGetParameter($key, $default = '')
{
    if (!empty($_GET[$key])) {
        return $_GET[$key];
    }
    return $default;
}

function getPostParameter($key, $default = '')
{
    if (!empty($_POST[$key])) {
        return $_POST[$key];
    }
    return $default;
}