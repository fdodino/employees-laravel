<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            'Engineering',
            'Marketing',
            'Sales',
            'Finance',
            'Human Resources',
            'Customer Support',
            'Product Management',
            'Operations',
            'Legal',
            'Research & Development'
        ];

        $employees = [
            ['name' => 'John Smith', 'department' => 'Engineering', 'employee_id' => 'E001'],
            ['name' => 'Jane Doe', 'department' => 'Marketing', 'employee_id' => 'E002'],
            ['name' => 'Bob Johnson', 'department' => 'Sales', 'employee_id' => 'E003'],
            ['name' => 'Alice Brown', 'department' => 'Finance', 'employee_id' => 'E004'],
            ['name' => 'Charlie Wilson', 'department' => 'Human Resources', 'employee_id' => 'E005'],
            ['name' => 'Diana Garcia', 'department' => 'Customer Support', 'employee_id' => 'E006'],
            ['name' => 'Frank Anderson', 'department' => 'Product Management', 'employee_id' => 'E007'],
            ['name' => 'Grace Miller', 'department' => 'Operations', 'employee_id' => 'E008'],
            ['name' => 'Henry Davis', 'department' => 'Legal', 'employee_id' => 'E009'],
            ['name' => 'Isabella White', 'department' => 'Research & Development', 'employee_id' => 'E010'],
            ['name' => 'Jack Harris', 'department' => 'Engineering', 'employee_id' => 'E011'],
            ['name' => 'Kate Lewis', 'department' => 'Marketing', 'employee_id' => 'E012'],
            ['name' => 'Louis Martinez', 'department' => 'Sales', 'employee_id' => 'E013'],
            ['name' => 'Mary Thompson', 'department' => 'Finance', 'employee_id' => 'E014'],
            ['name' => 'Nathan Roberts', 'department' => 'Human Resources', 'employee_id' => 'E015'],
            ['name' => 'Olivia Wilson', 'department' => 'Customer Support', 'employee_id' => 'E016'],
            ['name' => 'Peter Moore', 'department' => 'Product Management', 'employee_id' => 'E017'],
            ['name' => 'Quinn Taylor', 'department' => 'Operations', 'employee_id' => 'E018'],
            ['name' => 'Rachel Green', 'department' => 'Legal', 'employee_id' => 'E019'],
            ['name' => 'Sam Brown', 'department' => 'Research & Development', 'employee_id' => 'E020']
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
