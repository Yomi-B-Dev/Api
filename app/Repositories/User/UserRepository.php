<?php

namespace App\Repositories\User;

use App\User;

class UserRepository implements UserInterface
{
    protected $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function register($request)
    {
        return User::create([
            'email' => $request['email'],
            'gov_id' => md5($request['gov_id']),
            'name' => $request['name'],
            'phone' => $request['phone']
            ]);
    }

    public function update($user, $fields)
    {
        $user->update($fields);
    }
}