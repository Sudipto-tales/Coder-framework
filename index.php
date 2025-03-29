<?php
include __DIR__ . '/config/route.php';

// Get the requested route
$route = isset($_GET['route']) ? $_GET['route'] : 'default';

// Check if the route exists
if (array_key_exists($route, $routes)) {
    include $routes[$route];
} else {
    echo "404 - Page Not Found";
}
?>
