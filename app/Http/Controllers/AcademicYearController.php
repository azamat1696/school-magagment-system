<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $years = AcademicYear::all();
        Log::channel('info')->info('User is accessing all the  Academic Year', ['user' => auth()->user()->id,'controller' => 'AcademicYearController@index']);
        return view('academic-year.index',compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        Log::channel('info')->info('User is  trying   create  Academic Year', ['user' => auth()->user()->id,'controller' => 'AcademicYearController@create']);
        return view('academic-year.create');
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
            'BaslamaTarihi' => 'required|date',
            'BitisTarihi' => 'required||date',
            'status' => 'required'
        ]);

        $academic = AcademicYear::create($validated);
        Log::channel('info')->info('User    created  Academic Year', ['user' => auth()->user()->id,'controller' => 'AcademicYearController@store','academic' => $academic]);
        return redirect()->route('academic-year.index')->with('success',__('main.academic_year_created_with_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {

         $academicYear = AcademicYear::find($id);
        Log::channel('info')->info('User is  trying   edit  Academic Year', ['user' => auth()->user()->id,'controller' => 'AcademicYearController@edit','academicYear' => $academicYear]);
        return view('academic-year.edit',compact('academicYear'));
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
            'BaslamaTarihi' => 'required|date',
            'BitisTarihi' => 'required||date',
            'status' => 'required'
        ]);
        $academicYear = AcademicYear::find($id);
        $academicYear->update($validated);
        Log::channel('info')->info('User  updated  Academic Year', ['user' => auth()->user()->id,'controller' => 'AcademicYearController@update','academicYear' => $academicYear]);
        return redirect()->route('academic-year.index')->with('success',__('main.academic_year_updated_with_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        $academicYear = AcademicYear::find($id);
        $academicYear->delete();
        Log::channel('info')->info('User  deleted  Academic Year', ['user' => auth()->user()->id,'controller' => 'AcademicYearController@destroy','academicYear' => $academicYear]);
        return redirect()->route('academic-year.index')
               ->with('success', __('main.academic_year_deleted_with_success'));
    }
}
