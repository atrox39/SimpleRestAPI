<?php

class Router {
    private $req;

    function __construct()
    {
        $this->req = new class{
            public function send($text)
            {
                echo $text;
            }
    
            public function json($array)
            {
                header("Content-Type: application/json; charset=UTF-8");
                echo json_encode($array);
            }
        };
    }

    public function Get($route, $fn)
    {
        if($_SERVER['REQUEST_METHOD'] == "GET" && $_SERVER['REQUEST_URI'] == $route)
        {
            $req = $_REQUEST;
            $res = $this->req;
            $fn($req, $res);
        }        
    }

    public function Post($route, $fn)
    {
        if($_SERVER['REQUEST_METHOD'] == "POST" && $_SERVER['REQUEST_URI'] == $route)
        {
            $req = $_REQUEST;
            $res = $this->req;
            $fn($req, $res);
        }        
    }
}