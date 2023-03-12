<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        Log::channel('info')->info('User is accessing all the Courses', ['user' => auth()->user()->id,'controller' => 'CoursesController@index']);
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
        Log::channel('info')->info('User is trying to create a Course', ['user' => auth()->user()->id,'controller' => 'CoursesController@create']);
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
       $course = Course::create($validated);
       Log::channel('info')->info('User created a Course', ['user' => auth()->user()->id,'controller' => 'CoursesController@store','data' => $course]);
        return redirect()->route('courses.index')->with('success',__('main.course_created_with_success'));
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
        Log::channel('info')->info('User is trying to edit a Course', ['user' => auth()->user()->id,'controller' => 'CoursesController@edit','data' => $item]);
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
        Log::channel('info')->info('User updated a Course', ['user' => auth()->user()->id,'controller' => 'CoursesController@update','data' => $item]);
        return redirect()->route('courses.index')->with('success',__('main.course_updated_with_success'));

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
        Log::channel('warning')->warning('User deleted a Course', ['user' => auth()->user()->id,'controller' => 'CoursesController@destroy','data' => $id]);
         return redirect()->route('courses.index')->with('success', __('main.course_deleted_with_success'));

    }
}
