<?php
require_once __DIR__ . '/bootstarp.php';
require_once __BASEDIR__ . '/backend/Welcome.php';

$routes = [
    'default' => ['Welcome', 'index'],
];

// Get requested route safely
$route = $_GET['route'] ?? 'default';

// Check if route exists
if (isset($routes[$route])) {
    [$class, $method] = $routes[$route];
    
    // Check if class and method exist
    if (class_exists($class) && method_exists($class, $method)) {
        call_user_func([$class, $method]);
    } else {
        http_response_code(500);
        die("Server Error: Controller/Method not found");
    }
} else {
    http_response_code(404);
    die("404 - Page Not Found");
}
