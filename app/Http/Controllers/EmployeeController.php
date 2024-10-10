<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::get();
        return Inertia::render("Employee/Employee", [
            'employees' => $employee,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("Employee/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        Employee::create([
            'name' => $request->name,
            'ein' => $request->ein,
            'position' => $request->position,
            'departmen_division' => $request->departmen_division,
            'start_date' => $request->start_date,
            'employment_status' => $request->employment_status,
            'base_salary' => $request->base_salary,
            'bank_account' => $request->bank_account,
        ]);

        return redirect()->route('employees.index')->with('success', 'New employee successfully input!');
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
    public function edit(string $id)
    {
        $employees = Employee::find($id);
        return Inertia::render('Employee/Edit', [
            'employees' => $employees
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->ein = $request->ein;
        $employee->position = $request->position;
        $employee->departmen_division = $request->departmen_division;
        $employee->start_date = $request->start_date;
        $employee->employment_status = $request->employment_status;
        $employee->base_salary = $request->base_salary;
        $employee->bank_account = $request->bank_account;
        $employee->update();

        return redirect()->route('employees.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Data successfully Deleted!');
    }
}
