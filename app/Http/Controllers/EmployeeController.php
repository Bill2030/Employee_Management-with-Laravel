<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();

      
        return view("index", compact("employees"));
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
     */
    public function store(Request $request)
    {
        $request->validate([
            "emp_name"=> "required",
            "dob"=> "required",
            "phone"=> "required",
        ]);
        
        Employee::create($request->input());

        return redirect()->back()->with("success","Employee Created Successfully");
         
        
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
        $employee = Employee::find($id);
        
        return view("edit",["employee"=> $employee]);
        
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee= Employee::find($id);
        $employee->update(array_merge($employee->toArray(), $request->toArray()));
        return redirect()->back()->with("success","Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::destroy($id);

        return redirect()->back()->with("success","Item Deleted Successfully");
    }
}
