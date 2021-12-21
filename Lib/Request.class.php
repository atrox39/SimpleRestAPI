<?php
class Request
{
    public $body;
    public $method;
    public $session;

    public function __construct($body, $method, $session)
    {
        $this->body = $body;
        $this->method = $method;
        $this->session = $session;
    }

    public function DeleteSession($name)
    {
        unset($_SESSION[$name]);
    }
    public function UnsetSession()
    {
        session_unset();
    }
    public function DestroySession()
    {
        session_destroy();
    }
}