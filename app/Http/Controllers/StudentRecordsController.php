<?php

namespace App\Http\Controllers;

use App\Http\Requests\QualificationRequest;
use App\Models\AcademicYear;
use App\Models\Department;
use App\Models\Qualification;
use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentRecord;
use Illuminate\Http\Request;

class StudentRecordsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $studentRecords = StudentRecord::with('academicYear')->with('semester')->with('student')->with('user')->get();
        return view('student-records.index',compact('studentRecords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create($id)
    {
        $student = Student::find($id);
        $academicYears= AcademicYear::where('status',1)->get();
        $semesters = Semester::where('status',1)->get();
        return view('student-records.create',compact('student','academicYears','semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $validator = $request->validate([
          'academic_year_id' => 'required',
          'semester_id' => 'required',
          'student_id' => 'required',
          'status' => 'required',
        ]);

        StudentRecord::create(['user_id'=>auth()->user()->id]+$validator);
        return redirect()->route('student-records.index')->with('success','Öğrenci Yıl & Dönem kaydı başarıyla oluşturuldu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {

        $students = Student::where('status',1)->get();
        $academicYears= AcademicYear::where('status',1)->get();
        $semesters = Semester::where('status',1)->get();
        return view('student-records.show',compact('students','academicYears','semesters'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $studentRecord = StudentRecord::with('student')->find($id);
        $students = Student::where('status',1)->get();
        $academicYears= AcademicYear::where('status',1)->get();
        $semesters = Semester::where('status',1)->get();
        return view('student-records.edit',compact('students','academicYears','semesters','studentRecord'));
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
        $validator = $request->validate([
            'academic_year_id' => 'required',
            'semester_id' => 'required',
            'student_id' => 'required',
            'status' => 'required',
        ]);

        $studentRecord = StudentRecord::find($id);
        $studentRecord->update(['user_id' => auth()->user()->id]+$validator);
        return redirect()->route('student-records.index')->with('success','Öğrenci Akademnik ve Dönem Kaydı başarıyla güncenlendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        $studentRecord = StudentRecord::find($id);

        $studentRecord->delete();
        return redirect()->route('student-records.index')
            ->with('success','Öğrenci Akademnik ve Dönem Kaydı başarıyla silindi');
    }
}
