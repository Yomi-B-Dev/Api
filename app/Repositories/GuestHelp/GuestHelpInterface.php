<?php

namespace App\Repositories\GuestHelp;

interface GuestHelpInterface
{
    public function create($data);
    public function getById($guestHelpId);
    public function getAll();
    public function update($row, $fields);
}