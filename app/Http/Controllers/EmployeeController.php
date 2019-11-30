<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveEmployeeRequest;
use App\Model\Department;
use App\Model\Employee;
use App\Model\EmployeeDepartment;
use App\Repositories\Employee\EmployeeRepositoryInterface;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Categories Repository.
     *
     * @var EmployeeRepositoryInterface
     */
    private $employees;

    /**
     * EmployeeController constructor.
     * @param EmployeeRepositoryInterface $employees
     */
    public function __construct(EmployeeRepositoryInterface $employees)
    {
        parent::__construct();
        $this->employees = $employees;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function employees()
    {
        return view('employees.employees');
    }

    /**
     * Get employees list.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEmployeesList()
    {
        $employees = $this->employees->getEmployeesList();

        return response()->json([
            'data'      => $employees,
            'success'   => true
        ]);
    }

    public function saveEmployee(SaveEmployeeRequest $request) {
        $employee = Employee::create($request->except(['departments']));
        $departments = $request['departments'];

        $employeeDepartment = new EmployeeDepartment();
        foreach ($departments as $department) {
            $employeeDepartment->create([
                'employee_id' => $employee->id,
                'department_id' => $department
            ]);
        }

        return response()->json([
            'success'   => true
        ]);
    }
}
