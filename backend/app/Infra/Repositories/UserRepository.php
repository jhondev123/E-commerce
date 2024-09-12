<?php

namespace App\Infra\Repositories;

use App\Models\User;

class UserRepository
{
    public function getUserById(string $id)
    {
        return User::with('addresses')->findOrFail($id);
    }
}
