<?php

namespace App\Repositories\Grade;

use Illuminate\Database\Eloquent\Model;

class GradeRepository implements GradeInterface
{
    protected $gradeModel;

    public function __construct(Model $grade)
    {
        $this->gradeModel = $grade;
    }

    public function getById($id)
    {
        return $this->gradeModel->find($id);
    }

    public function getAll()
    {
        return $this->gradeModel->all();
    }

    public function create($data)
    {
        return $this->gradeModel->create($data);
    }

    public function delete($id)
    {
        $this->gradeModel->destroy($id);
    }

    public function update($inst, $fields)
    {
        $inst->update($fields);
    }
}