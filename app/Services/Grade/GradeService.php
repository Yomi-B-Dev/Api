<?php

namespace App\Services\Grade;

use App\Repositories\Grade\GradeInterface;

class GradeService
{
    protected $gradeRepo;

    public function __construct(GradeInterface $gradeRepo)
    {
        $this->gradeRepo = $gradeRepo;
    }

    public function get($d)
    {
        return $this->gradeRepo->getById($d);
    }

    public function getAll()
    {
        return $this->gradeRepo->getAll();
    }

    public function create($data)
    {
        return $this->gradeRepo->create($data);
    }

    public function delete($id)
    {
        $this->gradeRepo->delete($id);
    }

    public function update($inst, $fields)
    {
        $inst->update($fields);
    }
}