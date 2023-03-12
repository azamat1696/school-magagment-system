<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClassesController extends Controller
{
   public function index(){
       $sections = Section::with('course')->with('instructorUser')->with('icDenetimUser')->with('user')->get();
       Log::channel('info')->info('User is accessing all the Section', ['user' => auth()->user()->id,'controller' => 'ClassesController@index']);

       return view('sections.index',compact('sections'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $items = Course::all();
        $instructors = User::where('KullaniciTipi','Teacher')->get();
        Log::channel('info')->info('User is  trying   create  Section', ['user' => auth()->user()->id,'controller' => 'ClassesController@create']);
        return view('sections.create',compact('items','instructors'));
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
            'section_no' => 'required',
            'description' => 'sometimes',
            'course_id' => 'required',
            'instructor_user_id' => 'required',
            'theory_start_date' => 'required',
            'theory_end_date' => 'required',
            'practice_start_date' => 'required',
            'practice_end_date' => 'required',
            'ders_imza_end_date' => 'required',
            'status' => 'required',
        ]);
         $section = Section::create(['user_id'=>auth()->user()->id]+$validated);
        Log::channel('info')->info('User is  trying   create  Section', ['user' => auth()->user()->id,'controller' => 'ClassesController@store','section' => $section]);
        return redirect()->route('sections.index')->with('success', __('main.section_created_with_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $section = Section::find($id);
        $courses = Course::all();
        $instructors = User::where('KullaniciTipi','Teacher')->get();
        Log::channel('info')->info('User is  trying   edit  Section', ['user' => auth()->user()->id,'controller' => 'ClassesController@edit','section' => $section]);
        return view('sections.edit',compact('courses','instructors','section'));
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
            'name' => 'required',
            'section_no' => 'required',
            'description' => 'sometimes',
            'course_id' => 'required',
            'instructor_user_id' => 'required',
            'theory_start_date' => 'required',
            'theory_end_date' => 'required',
            'practice_start_date' => 'required',
            'practice_end_date' => 'required',
            'ders_imza_end_date' => 'required',
            'status' => 'required',
        ]);

        $item = Section::find($id);
        $item->update(['user_id'=>auth()->user()->id]+$validated);
        Log::channel('info')->info('User is  trying   update  Section', ['user' => auth()->user()->id,'controller' => 'ClassesController@update','section' => $item]);
        return redirect()->route('sections.index')->with('success',__('main.class_updated_with_success'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Section::destroy($id);
        Log::channel('info')->info('User is  trying   delete  Section', ['user' => auth()->user()->id,'controller' => 'ClassesController@destroy','section' => $id]);
        return redirect()->route('sections.index')->with('success',__('main.class_deleted_with_success'));

    }
}
