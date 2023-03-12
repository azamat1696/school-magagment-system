<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $semesters = Semester::with('academic_years')->get();
        Log::channel('info')->info('User  is accessing all the semester records ',['user'=> auth()->user(), 'SemesterController@index' => $semesters]);
        return view('semesters.index',compact('semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $years = AcademicYear::where('status',true)->get();
        Log::channel('info')->info('User trying to create Semester ',['user'=> auth()->user(), 'controller' => 'SemesterController@create' ]);
        return view('semesters.create',compact('years'));
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
            'academic_years_id' => 'required',
            'status' => 'required'
        ]);


         $data = Semester::create($validated);
        Log::channel('info')->info('User created Semester ',['user'=> auth()->user(), 'controller' => 'SemesterController@store', 'data' => $data ]);
         return redirect()->route('semesters.index')->with('success','Dönem başarıyla eklendi');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {

        $semesters = Semester::with('academic_years')->find($id);
        $years = AcademicYear::where('status',true)->get();
        Log::channel('info')->info('User trying to edit Semester ',['user'=> auth()->user(), 'controller' => 'SemesterController@edit', 'data' => $semesters ]);
        return view('semesters.edit',compact('semesters','years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required',
            'academic_years_id' => 'required',
            'status' => 'required'
        ]);

        $semesters = Semester::find($id);
        $semesters->update($validated);
        Log::channel('info')->info('User updated Semester ',['user'=> auth()->user(), 'controller' => 'SemesterController@update', 'data' => $semesters ]);
        return redirect()->route('semesters.index')->with('success',__('main.semester_updated_with_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        $semester = Semester::find($id);
        $semester->delete();
        Log::channel('info')->info('User deleted Semester ',['user'=> auth()->user(), 'controller' => 'SemesterController@destroy', 'data' => $semester ]);
        return redirect()->route('semesters.index')
            ->with('success',__('main.semester_deleted_with_success'));
    }
}
