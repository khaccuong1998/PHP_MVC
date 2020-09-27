<?php

    function hash_password($username, $password) {
        return sha1($username . $password);
    }