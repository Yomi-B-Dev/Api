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

    public function get($gradeId)
    {
        return $this->gradeRepo->getById($gradeId);
    }
}