<?php

namespace App\ValueObject;

class Email
{


    public function __construct(private string $email)
    {
    }

    public function value()
    {
        return $this->email;
    }

    public function toString()
    {
        return $this->email;
    }
}