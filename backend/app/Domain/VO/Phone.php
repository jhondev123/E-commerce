<?php

namespace App\Domain\VO;

final class Phone
{
    public function __construct(private string $phone)
    {
        $this->validatePhoneNumber($phone);
        // $this->phone = $phone;
    }

    private function validatePhoneNumber(string $phone): void
    {
        $pattern = '^(?:(?:\+|00)?(55)\s?)?(?:(?:\(?[1-9][0-9]\)?)?\s?)?(?:((?:9\d|[2-9])\d{3})-?(\d{4}))$';

        if (!preg_match($pattern, $phone)) {
            throw new \InvalidArgumentException("Invalid phone number format.");
        }
    }
    public function value(): string
    {
        return $this->phone;
    }
    public function __toString()
    {
        return $this->phone;
    }
}
