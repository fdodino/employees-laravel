<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected EmployeeService $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 15);
        $page = $request->query('page', 1);
        
        $employees = $this->employeeService->getAll($perPage, $page);
        
        return response()->json([
            'data' => $employees->items(),
            'meta' => [
                'total' => $employees->total(),
                'per_page' => $employees->perPage(),
                'current_page' => $employees->currentPage(),
                'last_page' => $employees->lastPage()
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'employee_id' => 'required|string|unique:employees,employee_id',
        ]);

        $employee = $this->employeeService->create($validated);

        return response()->json($employee, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        $employee = $this->employeeService->getById($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        return response()->json($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $id)
    {
        $employee = $this->employeeService->getById($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'department' => 'sometimes|required|string|max:255',
            'employee_id' => 'sometimes|required|string|unique:employees,employee_id,' . $id,
        ]);

        $updatedEmployee = $this->employeeService->update($employee, $validated);

        return response()->json($updatedEmployee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        $employee = $this->employeeService->getById($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $this->employeeService->delete($employee);

        return response()->json(['message' => 'Employee deleted successfully']);
    }
}
