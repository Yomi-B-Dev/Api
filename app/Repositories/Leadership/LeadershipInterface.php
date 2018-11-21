<?php

namespace App\Repositories\Leadership;

interface LeadershipInterface
{
    public function getById($id);
    public function getAll();
    public function create($data);
    public function delete($id);
    public function update($inst, $fields);
}