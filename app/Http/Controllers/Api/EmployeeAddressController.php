<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAddress;
use Illuminate\Http\Request;
use Validator;

class EmployeeAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'employee_id' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $empaddress = new EmployeeAddress;
            $empaddress->employee_id = $request->employee_id;
            $empaddress->address = $request->address;
            $empaddress->city = $request->city;
            $empaddress->state = $request->state;
            $empaddress->save();

            return response()->json('Data has been  Added', 200);
        }



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return EmployeeAddress::find($id);
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
            'employee_id' => 'required',
            'address'   => 'required',
            'city'    => 'required',
            'state'    => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        EmployeeAddress::where('id', $id)->update($request->all());

        return response()->json('Data Has been Updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        EmployeeAddress::find($id)->delete();
        return response()->json('Data Has Been deleted');
    }
}
