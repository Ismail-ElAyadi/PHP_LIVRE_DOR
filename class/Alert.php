<?php
class Alert {
    const SUCCESS_CLASS = "alert alert-success";
    const FAIL_CLASS = "alert alert-danger";

    public string $html_class;
    public string $message;

    public function __construct(bool $is_Success = false, string $message = "" )
    {
        $is_Success ? $this->html_class = self::SUCCESS_CLASS : $this->html_class = self::FAIL_CLASS ;
        $this->message = $message ; 
    }
    public function isUsable():bool
    {
        return strlen($this->message) > 0;
    }
}