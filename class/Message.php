<?php
class Message
{

    const MIN_CHAR_USERNAME = 3;
    const MIN_CHAR_MESSAGE = 10;

    private string $username;
    private string $message;
    private DateTime $date;

    public function __construct(string $username, string $message, ?DateTime $date = null)
    {
        $this->username = $username;
        $this->message = $message;
        $this->date = $date ? $date : new DateTime();
    }

    public function isValid(): bool
    {
        return strlen($this->username) >= self::MIN_CHAR_USERNAME && strlen($this->message) >= self::MIN_CHAR_MESSAGE;
    }

    public function getErrors(): array
    {
        $errors = [];
        if (strlen($this->username) < self::MIN_CHAR_USERNAME) {
            $errors["username"] = "Pseudo trop court";
        }
        if (strlen($this->message) < self::MIN_CHAR_MESSAGE) {
            $errors["message"] = "Message trop court";
        }
        return $errors;
    }

    public function toJson(): string
    {
        return json_encode([
            'username' => $this->username,
            'message' => $this->message,
            'date' => $this->date->getTimestamp()
        ]);
    }
}
