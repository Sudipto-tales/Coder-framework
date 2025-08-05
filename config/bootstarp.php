<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/framework.php';
require_once __DIR__ . '/db.php';
require_once 'Mailer.php';
require_once 'Auth.php';


// Function to load view files dynamically
function load_view($path, $data = []) {
    $base_dir = dirname(__DIR__); 
    $file_path = $base_dir . '/' . $path;
    if (file_exists($file_path)) {
        extract($data);
        require $file_path;
    } else {
        echo "Error: View '{$path}' not found!";
    }
}

function base_url($path = '') {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
    $base_url = $protocol . $_SERVER['HTTP_HOST'] . str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    
    return rtrim($base_url, '/') . '/' . ltrim($path, '/');
}
?>
