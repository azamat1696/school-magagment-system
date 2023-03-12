<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $departments = Department::all();
        Log::channel('info')->info('User is accessing all the departments', ['user' => auth()->user()->id,'controller' => 'Departments@index']);
        return view('departments.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        Log::channel('info')->info('User is trying to create a department', ['user' => auth()->user()->id,'controller' => 'Departments@create']);
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|unique:departments,name',
            'description' => 'sometimes',
            'department_no' => 'sometimes',
            'status' => 'required',
            'first_letter' => 'required',
        ]);
       $department = Department::create($validated);
        Log::channel('info')->info('User created a department', ['user' => auth()->user()->id,'controller' => 'Departments@store','data' => $department]);
        return redirect()->route('departments.index')->with('success',__('main.department_created_with_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassGroups  $classGroups
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $department = Department::find($id);
        Log::channel('info')->info('User is trying to edit a department', ['user' => auth()->user()->id,'controller' => 'Departments@edit','data' => $department]);
        return view('departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassGroups  $classGroups
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'sometimes',
            'department_no' => 'sometimes',
            'status' => 'required',
            'first_letter' => 'required',
        ]);
        $department = Department::find($id);
        $department->update($validated);
        Log::channel('info')->info('User updated a department', ['user' => auth()->user()->id,'controller' => 'Departments@update','data' => $department]);
        return redirect()->route('departments.index')->with('success','Sınıf Gurubu başarıyla güncellendi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassGroups  $classGroups
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        Log::channel('info')->info('User deleted a department', ['user' => auth()->user()->id,'controller' => 'Departments@destroy','data' => $id]);
        return redirect()->route('departments.index')->with('success',__('main.department_deleted_with_success'));
    }
}
