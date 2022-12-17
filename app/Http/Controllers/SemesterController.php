<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Semesters;
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
        $semesters = Semesters::with('academic_years')->get();

        return view('semesters.index',compact('semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $years = AcademicYear::where('Statu',true)->get();

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
            'DonemAdi' => 'required',
            'academic_years_id' => 'required',
            'Statu' => 'required'
        ]);


        Semesters::create($validated);
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

        $semesters = Semesters::with('academic_years')->find($id);
        $years = AcademicYear::where('Statu',true)->get();
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
            'DonemAdi' => 'required',
            'academic_years_id' => 'required',
            'Statu' => 'required'
        ]);
        $semesters = Semesters::find($id);
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

        $user = Semesters::find($id);
        $user->delete();
        return redirect()->route('semesters.index')
            ->with('success','Dönem başarıyla silindi');
    }
}
