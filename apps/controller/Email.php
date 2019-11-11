<?php
/**
 * Created by PhpStorm.
 * Date: 2019/10/23
 * Time: 上午9:25
 * @package: Email.php
 */

namespace apps\controller;


use InvalidArgumentException;

final class Email
{
    private $email;

    private function __construct($email)
    {
        $this->ensureIsValidEmail($email);

        $this->email = $email;
    }

    public static function fromString($email)
    {
        return new self($email);
    }

    public function __toString()
    {
        return (string) $this->email;
    }

    private function ensureIsValidEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid email address',
                    $email
                )
            );
        }
    }
}