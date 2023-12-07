<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Repositories\DepartmentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public $department;

    public function __construct(DepartmentRepository $department)
    {
        $this->department = $department;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('department.index', [
            'title' => 'department',
            'departments' => Department::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create', [
            'title' => 'department',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $this->department->create($request->all());
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'Something Went Wrong');
            return redirect()->route('departments.index');
        }
        DB::commit();
        $request->session()->flash('success', 'Department created successfully');
        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('department.view', [
            'title' => 'department',
            'department' => $department,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('department.edit', [
            'title' => 'department',
            'department' => $department,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required',
        ]);


        DB::beginTransaction();
        try {
            $this->department->update($request->all(), $department);
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'Something Went Wrong');
            return redirect()->route('departments.index');
        }
        DB::commit();
        $request->session()->flash('success', 'Department updated successfully');
        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Department $department)
    {
        DB::beginTransaction();
        try {
            $this->department->delete($department);
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'Something Went Wrong');
            return redirect()->route('departments.index');
        }
        DB::commit();
        $request->session()->flash('success', 'Department deleted successfully');
        return redirect()->route('departments.index');
    }
}
