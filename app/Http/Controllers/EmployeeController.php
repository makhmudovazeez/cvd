<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;

/**
 * Class EmployeeController
 * @package App\Http\Controllers
 */

final class EmployeeController extends Controller
{
    /* @var EmployeeService */
    private $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $employees = $this->employeeService->findAll(\request()->all());
        return response()->json($employees);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id){
        $employee = $this->employeeService->findOne($id);
        return response()->json($employee);
    }
}
