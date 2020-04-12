<?php
$users = new \Project\controllers\ControllerFront();
$users->deleteUsers(); 

$redirection = new \Project\controllers\ControllerFront();
$redirection->home();