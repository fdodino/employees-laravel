<?php

namespace App\Services;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\PaginationHelper;

class EmployeeService
{
    /**
     * Create a new employee
     *
     * @param array $data
     * @return Employee
     */
    public function create(array $data): Employee
    {
        return DB::transaction(function () use ($data) {
            return Employee::create($data);
        });
    }

    /**
     * Update an existing employee
     *
     * @param Employee $employee
     * @param array $data
     * @return Employee
     */
    public function update(Employee $employee, array $data): Employee
    {
        return DB::transaction(function () use ($employee, $data) {
            $employee->update($data);
            return $employee->fresh();
        });
    }

    /**
     * Delete an employee
     *
     * @param Employee $employee
     * @return void
     */
    public function delete(Employee $employee): void
    {
        DB::transaction(function () use ($employee) {
            $employee->delete();
        });
    }

    /**
     * Get an employee by ID
     *
     * @param string $id
     * @return Employee|null
     */
    public function getById(string $id): ?Employee
    {
        return Employee::findOrFail($id);
    }

    /**
     * Get all employees with pagination
     *
     * @param int $perPage Number of items per page
     * @param int $page Current page number
     * @return LengthAwarePaginator
     */


    public function getAll(int $perPage = 15, int $page = 1): LengthAwarePaginator
    {
        $pagination = PaginationHelper::calculatePagination($perPage, $page, Employee::class);
        
        $employees = Employee::skip($pagination['skip'])
            ->take($perPage)
            ->get();
        
        return new LengthAwarePaginator(
            $employees,
            $pagination['total'],
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }

}
