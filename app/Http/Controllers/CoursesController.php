<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $items = Course::with('department')->get();
        return view('courses.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $items = Department::all();
       return view('courses.create',compact('items'));
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
           'name' => 'required',
           'course_no' => 'required',
           'description' => 'sometimes',
           'department_id' => 'required',
           'status' => 'required',
        ]);
        Course::create($validated);
        return redirect()->route('courses.index')->with('success','Ders başarıyla oluşturuldu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $item = Course::find($id);
        $departments = Department::all();
        return view('courses.edit',compact('item','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'course_no' => 'required',
            'description' => 'sometimes',
            'department_id' => 'required',
            'status' => 'required',
        ]);
        $item = Course::find($id);
        $item->update($validated);
        return redirect()->route('courses.index')->with('success','Ders başarıyla güncellendi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Course::destroy($id);
         return redirect()->route('courses.index')->with('success','Ders başarıyla silindi');

    }
}
