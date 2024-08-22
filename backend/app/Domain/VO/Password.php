<?php

namespace App\Domain\VO;

use Illuminate\Support\Facades\Validator;

class Password
{
    public function __construct(private string $password)
    {
        $this->validatePassword($password);
    }
    public function validatePassword($password): void
    {
        $validator = Validator::make(
            ['password' => $password],
            [
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/^(?=.*[A-Z])(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'
                ],
            ],
            [
                'password.regex' => 'A senha deve conter pelo menos uma letra maiúscula e um caractere especial.'
            ]
        );

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first('password'));
        }
    }
    public function value(): string
    {
        return $this->password;
    }
    public function __toString()
    {
        return $this->password;
    }
}
