<?php
include_once('./Lib/Router.class.php');
$router = new Router();
$router->Get("/", function($req, $res){
    $res->render('index');
});