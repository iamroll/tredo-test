<?php

namespace App\Repositories\Department;

use App\Repositories\CoreRepository;
use App\Model\Department as Model;

class DepartmentRepository extends CoreRepository implements DepartmentRepositoryInterface
{
    /**
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getDepartmentsList()
    {
        $departments = $this
            ->startConditions()
            ->orderBy('updated_at', 'desc')
            ->get();

        return $departments;
    }
}
