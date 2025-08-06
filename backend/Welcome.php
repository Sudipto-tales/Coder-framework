<?php
class Welcome
{
    public static function index()
    {
        // Load the welcome view
       return load_view('resources/views/welcome.php');
    }

}
?>