<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveDepartmentRequest;
use App\Model\Department;
use App\Repositories\Department\DepartmentRepositoryInterface;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * @var DepartmentRepositoryInterface
     */
    private $departments;

    /**
     * DepartmentController constructor.
     * @param DepartmentRepositoryInterface $departments
     */
    public function __construct(DepartmentRepositoryInterface $departments)
    {
        parent::__construct();
        $this->departments = $departments;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function departments()
    {
        return view('departments.departments');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDepartmentsList()
    {
        $departments = $this->departments->getDepartmentsList();

        return response()->json([
            'data'      => $departments,
            'success'   => true
        ]);
    }

    /**
     * @param SaveDepartmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveDepartment(SaveDepartmentRequest $request)
    {
        Department::create($request->all());

        return response()->json([
            'success' => true
        ]);
    }

    public function deleteDepartment($id)
    {
        Department::destroy($id);

        return response()->json([
            'success' => true
        ]);
    }
}
