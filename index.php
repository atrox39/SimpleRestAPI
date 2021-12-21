<?php
include_once('./autoload.class.php'); // Necesary for load any lib
$router = new Router();
$router->Get("/", function($req, $res){
    $res->send("TestMessage");
});