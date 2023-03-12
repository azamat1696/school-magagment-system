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
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

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
        Log::channel('info')->info('User is accessing all the student records', ['user' => auth()->user()->id]);
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
        Log::channel('info')->info('User is trying to create a student record', ['user' => auth()->user()->id]);
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
        Log::channel('info')->warning('User  created a student record', ['user' => auth()->user()->id .' '.auth()->user()->name, 'student record'=>$validator]);
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
        Log::channel('info')->info('User is trying to create a student record', ['user' => auth()->user()->id]);
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
        Log::channel('info')->info('User is trying to edit a student record', ['user' => auth()->user()->id, 'data'=>$studentRecord]);
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
        Log::channel('info')->warning('User  updated a student record', ['user' => auth()->user()->id .' '.auth()->user()->name, 'data'=>$validator]);
        return redirect()->route('student-records.index')->with('success',__('main.academic_semester_registeration_updated_with_success'));
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
        Log::channel('info')->warning('User  deleted a student record', ['user' => auth()->user()->id .' '.auth()->user()->name, 'data'=>$studentRecord]);
        return redirect()->route('student-records.index')
            ->with('success','Öğrenci Akademnik ve Dönem Kaydı başarıyla silindi');
    }
}
