<?php
$article = new \Project\controllers\ControllerBack();
$article->deleteComment(); 

$redirection = new \Project\controllers\ControllerBack();
$redirection->adminBack();