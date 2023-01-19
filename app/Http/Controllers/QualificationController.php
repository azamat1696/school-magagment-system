<?php

namespace App\Http\Controllers;

 use App\Http\Requests\QualificationRequest;
  use App\Models\Department;
use App\Models\Qualification;
use App\Models\Student;

class QualificationController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $qualifications = Qualification::with('student')->with('user')->with('departmnent')->get();
        return view('qualifications.index',compact('qualifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create($id)
    {
        $student = Student::find($id);
        $departments = Department::all();
        return view('qualifications.create',compact('student','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(QualificationRequest $request)
    {

        Qualification::create(['user_id'=>auth()->user()->id]+$request->validated());
        return redirect()->route('qualifications.index')->with('success','Mesleki Yeterlilik başarıyla oluşturuldu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {

        $students = Student::all();
        $departments = Department::all();
        return view('qualifications.show',compact('students','departments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $qualification = Qualification::with('student')->find($id);
        $departments = Department::all();
          return view('qualifications.edit',compact('departments','qualification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(QualificationRequest $request, $id)
    {

        $qualification = Qualification::find($id);
         $qualification->update(['user_id' => auth()->user()->id]+$request->validated());
        return redirect()->route('qualifications.index')->with('success','Öğrenci Mesleki Yeterilik başarıyla güncenlendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        $qualification = Qualification::find($id);

        $qualification->delete();
        return redirect()->route('qualifications.index')
            ->with('success','Öğrenci MY başarıyla silindi');
    }
}
