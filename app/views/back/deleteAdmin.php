<?php
$admin = new \Project\controllers\ControllerBack();
$admin->deleteAdmin();

$redirection = new \Project\controllers\ControllerBack();
$redirection->login();