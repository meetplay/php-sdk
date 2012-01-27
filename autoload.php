<?php

require_once __DIR__.'/vendor/SplClassLoader/SplClassLoader.php';

call_user_func(function(){
    // meetplay-sdk
    $loader = new SplClassLoader('Meetplay', __DIR__.'/lib');
    $loader->register();

    // oauth2
    $loader = new SplClassLoader('OAuth2', __DIR__.'/vendor/oauth2-php/lib');
    $loader->register();
});

