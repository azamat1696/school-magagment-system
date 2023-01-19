<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Semester;
use Illuminate\Http\Request;

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


        Semester::create($validated);
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
        return redirect()->route('semesters.index')->with('success','Dönem başarıyla güncenlendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        $user = Semester::find($id);
        $user->delete();
        return redirect()->route('semesters.index')
            ->with('success','Dönem başarıyla silindi');
    }
}
