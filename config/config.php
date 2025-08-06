<?php
// Manually set live base URL with folder name
// Set Live server path
// ecample : https://example.com/Coder-framework
$live_base_url = "https://localhost/Coder-framework";
$baseDir = dirname(__DIR__); // Get the base directory of the project
define('__BASEDIR__', $baseDir);
// Auto-detect environment
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
    $folder_name = basename(__DIR__);
    $base_url = $protocol . $_SERVER['HTTP_HOST'] . "/" . $folder_name;
} else {
    $base_url = $live_base_url;
}


?>
