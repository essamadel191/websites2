<?php

# Current URI is the server request URI
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

### dd($uri);

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php'
];

function routeToController($uri,$routes){
    
# array_key_exists checks if the key exists in the array 
    if(array_key_exists($uri, $routes)){
        require $routes[$uri]; 
    }else{
        abort();
    }

}

# Default code 404
function abort($code = 404){
    http_response_code($code);
    
    require "views/{$code}.php";
    
    die();
}

routeToController($uri,$routes);
