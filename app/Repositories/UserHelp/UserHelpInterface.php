<?php

namespace App\Repositories\UserHelp;

interface UserHelpInterface
{
    public function create($data);
    public function getById($guestHelpId);
    public function getAll();
    public function update($row, $fields);
}