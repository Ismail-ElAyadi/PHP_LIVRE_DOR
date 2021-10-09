<?php
class Alert {
    const SUCCESS_CLASS = "alert alert-success";
    const FAIL_CLASS = "alert alert-danger";

    private string $html_class;
    private string $message;

    public function __construct(bool $is_Success = false, string $message = "" )
    {
        $is_Success ? $this->html_class = self::SUCCESS_CLASS : $this->html_class = self::FAIL_CLASS ;
        $this->message = $message ; 
    }

    public function resetAlert(bool $is_Success, string $message):void
    {
        $is_Success ? $this->html_class = self::SUCCESS_CLASS :$this->html_class = self::FAIL_CLASS ;
        $this->message = $message ; 
    }

    public function getMessage():string
    {
        return $this->message;
    }

    public function getClass():string
    {
        return $this->html_class ;
    }

    public function setMessage(string $message):void 
    {
        $this->message = $message;
    }
    
    public function setClass(string $html_class):void 
    {
        $this->html_class = $html_class;
    }

    public function isUsable():bool
    {
        return strlen($this->message) > 0;
    }
}