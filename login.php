<?php
// Include the main class, the rest will be automatically loaded
require 'vendor/autoload.php';
include 'config.php';
// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();
$tpl = new Dwoo\Template\File($theme_path.'login.tpl');

echo $core->get($tpl);

?>