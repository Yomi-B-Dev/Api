<?php

namespace App\Repositories\User;

interface UserInterface
{
    public function update($data, $fields);
    public function register($data);
    public function get($id);
    public function getAll();
    public function delete($id);
}