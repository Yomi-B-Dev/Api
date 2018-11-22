<?php

namespace App\Repositories\User;

use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserInterface
{
    protected $userModel;

    public function __construct(Model $user)
    {
        $this->userModel = $user;
    }

    public function register($request)
    {
        return $this->userModel->create([
            'email' => $request['email'],
            'gov_id' => $request['gov_id'],
            'name' => $request['name'],
            'phone' => $request['phone']
        ]);
    }

    public function update($user, $fields)
    {
        $user->update($fields);
    }

    public function get($id)
    {
        return $this->userModel->find($id);
    }

    public function getAll()
    {
        return $this->userModel->all();
    }

    public function delete($id)
    {
        return $this->userModel->destroy($id);
    }
}
