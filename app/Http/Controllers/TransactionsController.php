<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionsRequest;
use App\Models\Department;
use App\Models\Qualification;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Transaction;
 use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        Log::channel('info')->info('User is accessing all the transactions', ['user' => Auth::user()->id]);
        return view('transactions.index',compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create($id)
    {
        Log::channel('info')->info('User is trying to create a transaction', ['user' => Auth::user()->id]);
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
        Log::channel('info')->warning('User  created a transaction', ['user' => Auth::user()->id .' '.Auth::user()->name, 'transaction'=>$request->validated()]);
        return redirect()->route('transactions.index')->with('success',__('main.qualification_created_with_success'));
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
        Log::channel('info')->info('User is trying to show a transaction', ['user' => Auth::user()->id .': '.Auth::user()->name]);
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
        Log::channel('info')->info('User trying to edit a transaction', ['user' => Auth::user()->id .': '.Auth::user()->name, 'transaction'=> $id]);
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
        Log::channel('info')->info('User updated a transaction', ['user' => Auth::user()->id .': '.Auth::user()->name, 'transaction'=> $transaction]);
        return redirect()->route('transactions.index')->with('success', __('main.student'). $transaction->transaction_type.' '. __('main.with_success_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        $qualification = Transaction::find($id);

        $qualification->delete();
        Log::channel('info')->info('User deleted a transaction', ['user' => Auth::user()->id .': '.Auth::user()->name, 'transaction'=> $id]);
        return redirect()->route('transactions.index')
            ->with('success',__('main.student_with_success_deleted'));
    }
    public function ajaxQualification($id){
        $qualificaiton = Qualification::where('student_id',$id)->get();
        return response()->json($qualificaiton);
    }
}
