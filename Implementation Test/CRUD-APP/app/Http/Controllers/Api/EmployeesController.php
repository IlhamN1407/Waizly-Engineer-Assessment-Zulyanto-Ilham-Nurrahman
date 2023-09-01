<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeesResource;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EmployeesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::all();

        return $this->sendSuccess(EmployeesResource::collection($employees), 'SUCCESS');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $put = $request->all();

        $validate = Validator::make($put, [
            'employee_fname' => 'required',
            'salary' => 'required',
            'Departement' => 'required',
            'Job_title' => 'required',
        ]);


        if ($validate->fails()) {
            return $this->sendError('Error data required', $validate->errors());
        } //  else if ($validate->) {
        //     # code...
        // }

        $employees = Employees::create($put);

        return $this->sendSuccess(new EmployeesResource($employees), 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = Employees::find($id);
        if (is_null($employees)) {
            return $this->sendError('Not Found data', 500);
        }

        return $this->sendSuccess(new EmployeesResource($employees), 'SUCCESS find Employee');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employees  $employees
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $put = $request->all();
        $validate = Validator::make($put, [
            'employee_fname' => 'required',
            'salary' => 'required',
            'Departement' => 'required',
            'Job_Title' => 'required',
        ]);

        if ($validate->fails()) {
            return $this->sendError('Error data required', $validate->errors());
        }
        $employees = Employees::find($id);
        $employees->employee_fname = $put['employee_fname'];
        $employees->salary = $put['salary'];
        $employees->Departement = $put['Departement'];
        $employees->Job_Title = $put['Job_Title'];
        $employees->save();

        return $this->sendSuccess(new EmployeesResource($employees), 'Product Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employees  $employees
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employees::find($id);
        $employee->delete();

        return $this->sendSuccess([], 'Employee Deleted Successfully.');
    }
}
