<?php

namespace App\Http\Controllers;

use App\Helpers\FileUploader;
use App\Http\Requests\StudentRequest;
use App\Models\AcademicYear;
use App\Models\Countries;
use App\Models\Student;
use Doctrine\DBAL\Driver\Exception;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    protected $filePath;
     public function __construct()
     {
         $this->filePath = public_path('student-images');
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $students = Student::with('country_related')->with('user')->get();
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
    public function store(StudentRequest $request)
    {


      $fileName = 'no-image.jpg';
      if ($request->hasFile('student_photo'))
      {
          try {
              $file = new FileUploader($this->filePath, $request->student_photo,$request->name);
              $fileName = $file->upload();
          } catch (Exception $exception){
              echo $exception;
          }
      }
         Student::create(['student_photo' => $fileName,'user_id' => auth()->user()->id ]+$request->validated());
        return redirect()->route('students.index')->with('success','Akademik yıl başarıyla güncenlendi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {

        $student = Student::find($id);
        $countries = Countries::all();
        return view('students.edit',compact('countries','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StudentRequest $request, $id)
    {

        $student = Student::find($id);
        $fileName = $student->student_photo;
        if ($request->hasFile('student_photo'))
        {
            if ($student->student_photo != 'no-image.jpg')
            {
                try {
                    unlink($this->filePath."/".$fileName);
                 }catch (Exception $exception){
                    echo $exception;
                }
            }
            try {
                $file = new FileUploader($this->filePath, $request->student_photo,$request->name);
                $fileName = $file->upload();
            } catch (Exception $exception){
                echo $exception;
            }
        }
        $student->update(['student_photo' => $fileName,'user_id' => auth()->user()->id]+$request->validated());
        return redirect()->route('students.index')->with('success','Öğrenci başarıyla güncenlendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        $student = Student::find($id);
        if ($student->student_photo != 'no-image.jpg')
        {
            try {
                unlink($this->filePath."/".$student->student_photo);
            } catch (\Exception $exception){
                echo $exception;
            }
        }
        $student->delete();
        return redirect()->route('students.index')
            ->with('success','Öğrenci başarıyla silindi');
    }
}
