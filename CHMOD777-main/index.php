<?php
session_start();
$DS = DIRECTORY_SEPARATOR;
require_once __DIR__.$DS.'lib'.$DS.'File.php';
require_once __DIR__.$DS.'lib'.$DS.'Security.php';
require_once File::build_path(array("controller","routeur.php"));

?>

