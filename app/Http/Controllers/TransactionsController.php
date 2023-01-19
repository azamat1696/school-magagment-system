<?php

namespace App\Http\Controllers;

use App\Http\Requests\QualificationRequest;
use App\Http\Requests\TransactionsRequest;
use App\Models\Department;
use App\Models\Qualification;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $transactions = Transaction::with('student')->with('user')->with('department')->with('qualification')->with('semester')->get();
        return view('transactions.index',compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create($id)
    {
        $student = Student::with('qualification')->find($id);
        $departments = Department::all();
        $semesters = Semester::all();
        return view('transactions.create',compact('student','departments','semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TransactionsRequest $request)
    {

        Transaction::create(['user_id'=>auth()->user()->id]+$request->validated());
        return redirect()->route('transactions.index')->with('success','Mesleki Yeterlilik başarıyla oluşturuldu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        $students = Student::with('qualification')->get();
        $departments = Department::all();
        $semesters = Semester::all();
        return view('transactions.show',compact('students','departments','semesters'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $transaction= Transaction::with('student')->find($id);
        $departments = Department::all();
        $semesters = Semester::all();
        $students = Student::all();

        return view('transactions.edit',compact('departments','transaction','semesters','students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TransactionsRequest $request, $id)
    {

        $transaction= Transaction::find($id);
        $transaction->update(['user_id' => auth()->user()->id]+$request->validated());
        return redirect()->route('transactions.index')->with('success','Öğrenci '. $transaction->transaction_type.' başarıyla güncenlendi');
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
        return redirect()->route('transactions.index')
            ->with('success','Öğrenci MY başarıyla silindi');
    }
    public function ajaxQualification($id){
        $qualificaiton = Qualification::where('student_id',$id)->get();
        return response()->json($qualificaiton);
    }
}
