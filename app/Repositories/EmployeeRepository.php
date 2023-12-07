<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class EmployeeRepository
{
    public function create($data)
    {
        $employee = Employee::create([
            'department_id' => $data['department_id'],
            'name' => $data['name'],
            'dob' => $data['dob'],
            'gender_id' => $data['gender_id'],
        ]);

        return $employee;
    }

    public function update($data, $employee)
    {
        $employee->department_id  = $data['department_id'];
        $employee->name  = $data['name'];
        $employee->dob  = $data['dob'];
        $employee->gender_id  = $data['gender_id'];
        $employee->save();

        return $employee;
    }

    public function delete($employee)
    {
        $employee->delete();
    }
}
