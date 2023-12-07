<?php

namespace App\Repositories;

use App\Models\Department;

class DepartmentRepository
{
    public function create($data)
    {
        return Department::create([
            'name' => $data['name'],
        ]);
    }

    public function update($data, $department)
    {
        $department->name  = $data['name'];
        $department->save();

        return $department;
    }

    public function delete($department)
    {
        $department->delete();
    }
}
