<?php
// Manually set live base URL with folder name
// Set Live server path
// ecample : https://example.com/Coder-framework
$live_base_url = "https://localhost/Coder-framework";

// Auto-detect environment
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
    $folder_name = basename(__DIR__);
    $base_url = $protocol . $_SERVER['HTTP_HOST'] . "/" . $folder_name;
} else {
    $base_url = $live_base_url;
}


?>
