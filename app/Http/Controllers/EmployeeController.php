<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Employee;
// use Illuminate\view\view;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
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
        $employee = Employee::create([
            "name"=> $request->name,
            "address"=> $request->address,
            "mobile_no"=> $request->mobile_no,
        ]);
        $employee->save();
        return response()->json("Employee Created!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::find($id);
        return response()->json($employee);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $employee = Employee::where('id', $id)->update([
            "name"=>$request->name,
            "address"=> $request->address,
            "mobile_no"=> $request->mobile_no
        ]);
        
        if(!empty($employee)){
            return response()->json("Employee Updated!");
        }else{
            return response()->json("Employee not Updated!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return response()->json("Employee Deleted!");
    }
}
