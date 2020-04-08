<?php
$article = new \Project\controllers\ControllerFront();
$article->deleteArticle(); 

$redirection = new \Project\controllers\ControllerFront();
$redirection->accountFront();