<?php

namespace App\Repositories\Employee;

use App\Model\Department;
use App\Model\Employee as Model;
use App\Model\EmployeeDepartment;
use App\Repositories\CoreRepository;

class EmployeeRepository extends CoreRepository implements EmployeeRepositoryInterface
{
    /**
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Get all employees.
     *
     * @return mixed
     */
    public function getEmployeesList()
    {
        $employees = $this
            ->startConditions()
            ->orderBy('updated_at', 'desc')
            ->get();
        foreach ($employees as $employee) {
            $departmentIds = EmployeeDepartment::where('employee_id', $employee->id)->get('department_id');
            $departmentNames = $this->getDeparmentNames($departmentIds);
            $employee['departments_count'] = $departmentNames;
        }

        return $employees;
    }

    protected function getDeparmentNames($departmentIds)
    {
        $arr = [];
        foreach ($departmentIds as $department) {
            $arr[] = Department::where('id', $department->department_id)->first()->name;
        }
        return join(", ", $arr);
    }
}
