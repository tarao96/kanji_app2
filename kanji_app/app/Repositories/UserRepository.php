<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function create(array $data)
    {
        $user = new User;
        $user->fill($data)->save();
        return $user;
    }

    public function update(int $id, array $data)
    {
        $user = User::find($id);
        $user->fill($data)->save();
        return $user;
    }
}
