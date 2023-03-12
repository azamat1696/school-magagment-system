<?php

namespace App\Http\Controllers;

use App\Http\Requests\QualificationRequest;
use App\Models\Department;
use App\Models\Qualification;
use App\Models\Student;
use Illuminate\Support\Facades\Log;

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
        Log::channel('info')->info('User is accessing all the qualifications', ['user' => auth()->user()->id]);
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
        Log::channel('info')->info('User is trying to create a qualification', ['user' => auth()->user()->id,'controller' => 'Qualification@store']);
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

        $data = Qualification::create(['user_id'=>auth()->user()->id]+$request->validated());
        Log::channel('info')->info('User is creating a qualification', ['user' => auth()->user()->id, 'controller' => 'Qualification@store','qualification' => $data]);
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
        Log::channel('info')->info('User is trying to show qualifications', ['user' => auth()->user()->id, 'controller' => 'Qualification@show']);
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
        Log::channel('info')->info('User is trying to edit a qualification', ['user' => auth()->user()->id, 'controller' => 'Qualification@edit','data' => $qualification]);
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
        Log::channel('info')->info('User is updating a qualification', ['user' => auth()->user()->id, 'controller' => 'Qualification@update','data' => $qualification]);
        return redirect()->route('qualifications.index')->with('success',__('main.qualification_updated_with_success'));
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
        Log::channel('info')->info('User is deleting a qualification', ['user' => auth()->user()->id, 'controller' => 'Qualification@destroy','data' => $qualification]);
        return redirect()->route('qualifications.index')
            ->with('success',__('main.qualification_deleted_with_success'));
    }
}
