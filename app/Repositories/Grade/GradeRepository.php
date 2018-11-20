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

    public function getById($gradeId)
    {
        return $this->gradeModel->find($gradeId);
    }
}