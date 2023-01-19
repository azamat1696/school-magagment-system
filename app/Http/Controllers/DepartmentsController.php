<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

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
        return view('departments.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
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
        Department::create($validated);
        return redirect()->route('departments.index')->with('success','Sınıf başarıyla eklendi');
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
        return redirect()->route('departments.index')->with('success','Sınıf Gurubu başarıyla silindi');
    }
}
