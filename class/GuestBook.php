<?php

require_once 'Message.php';
class GuestBook
{
    private $file;

    public function __construct(string $file)
    {
        $directory = dirname($file);
        if (!is_dir($directory)) {
            var_dump(mkdir($directory, 777, true));
        }
        if (!file_exists($file)) {
            touch($file);
        }
        $this->file = $file;
    }

    public function addMessage(Message $message): void 
    {
        // PHP_EOL => PHP END OF LINE -> FIN DE LIGNE
        file_put_contents($this->file, $message->toJSON() . PHP_EOL, FILE_APPEND);
    }

}
