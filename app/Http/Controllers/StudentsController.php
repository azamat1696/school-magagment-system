<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $students = Students::all();
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Countries::all();
        return view('students.create',compact('countries'));
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
            'BitisTarihi' => 'required||date'
        ]);
        AcademicYear::create($validated);
        return redirect()->route('academic-year.index')->with('success','Akademik yıl başarıyla eklendi');
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
            'BitisTarihi' => 'required||date'
        ]);
        $academicYear = AcademicYear::find($id);
        $academicYear->update($validated);
        return redirect()->route('academic-year.index')->with('success','Akademik yıl başarıyla güncenlendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        $user = AcademicYear::find($id);
        $user->delete();
        return redirect()->route('academic-year.index')
            ->with('success','Akademik yıl başarıyla silindi');
    }
}
