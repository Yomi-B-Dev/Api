<?php

namespace App\Repositories\Movement;

interface MovementInterface
{
    public function getById($id);
    public function getAll();
    public function create($data);
    public function delete($id);
    public function update($inst, $fields);
}