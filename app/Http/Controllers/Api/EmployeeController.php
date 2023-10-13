<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Employee::with(['employeeAddress','employeeSalary'])->where('id',1)->get();
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
         $validator = Validator::make($request->all(),
        [
            'employee_name' => 'required',
            'employee_id' => 'required',
            'department' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $employee = new Employee;
            $employee->employee_name = $request->employee_name;
            $employee->employee_id = $request->employee_id;
            $employee->department = $request->department;
            $employee->save();

            return response()->json('Data has been  Added', 200);
        }



    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //  return Employee::find($id);

        return Employee::with(['employeeAddress','employeeSalary'])->find($id);
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
        $validator = Validator::make($request->all(), [
            'employee_name' => 'required',
            'employee_id'   => 'required',
            'department'    => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

         Employee::where('id', $id)->update($request->all());

        return response()->json('Data Has been Updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Employee::find($id)->delete();
        return response()->json('Data Has Been deleted');
    }
}
