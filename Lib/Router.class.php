<?php

class Router {
    private $req;
    private $res;

    function __construct()
    {
        $this->req = new Request();
        $this->req->body = file_get_contents('php://input');
        $this->req->method = $_SERVER['REQUEST_METHOD'];
        $this->req->props = new stdClass();
        $this->res = new class{
            public function send($text)
            {
                http_response_code(200);
                echo $text;
            }
    
            public function json($array)
            {
                header("Content-Type: application/json; charset=UTF-8");
                try{
                http_response_code(200);
                echo json_encode($array);
                }catch(Exception $ex){
                    http_response_code(500);
                    echo json_encode(array($ex->getMessage()));
                }
            }
        };
    }

    public function Get($route, $fn)
    {
        if($_SERVER['REQUEST_METHOD'] == "GET" && $_SERVER['REQUEST_URI'] == $route)
        {
            $req = $this->req;
            $res = $this->res;
            $fn($req, $res);
        }        
    }

    public function Post($route, $fn)
    {
        if($_SERVER['REQUEST_METHOD'] == "POST" && $_SERVER['REQUEST_URI'] == $route)
        {
            $req = $this->req;
            $res = $this->res;
            $fn($req, $res);
        }        
    }
}