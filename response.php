<?php

class Response
{
    public $status;
    public $message;

    public function __construct($status, $message) {
        $this->message = $message;
        $this->status = $status;
    }
}