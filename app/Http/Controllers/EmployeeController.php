<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Gender;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public $employee;

    public function __construct(EmployeeRepository $employee)
    {
        $this->employee = $employee;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employee.index', [
            'title' => 'employee',
            'employees' => Employee::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create', [
            'title' => 'employee',
            'departments' => Department::get(),
            'genders' => Gender::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required',
            'gender_id' => 'required',
            'name' => 'required',
            'dob' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $this->employee->create($request->all());
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'Something Went Wrong');
            return redirect()->route('employees.index');
        }
        DB::commit();
        $request->session()->flash('success', 'Employee created successfully');
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', [
            'title' => 'employee',
            'employee' => $employee,
            'departments' => Department::get(),
            'genders' => Gender::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
        ]);


        DB::beginTransaction();
        try {
            $this->employee->update($request->all(), $employee);
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'Something Went Wrong');
            return redirect()->route('employees.index');
        }
        DB::commit();
        $request->session()->flash('success', 'Employee updated successfully');
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Employee $employee)
    {
        DB::beginTransaction();
        try {
            $this->employee->delete($employee);
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'Something Went Wrong');
            return redirect()->route('employees.index');
        }
        DB::commit();
        $request->session()->flash('success', 'Employee deleted successfully');
        return redirect()->route('employees.index');
    }
}
