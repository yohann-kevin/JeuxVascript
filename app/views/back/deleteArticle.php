<?php
$article = new \Project\controllers\ControllerBack();
$article->deleteArticle(); 

$redirection = new \Project\controllers\ControllerBack();
$redirection->adminBack();