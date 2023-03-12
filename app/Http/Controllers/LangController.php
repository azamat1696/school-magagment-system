<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class LangController extends Controller
{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

//    public function index()
//
//    {
//
//        return view('home');
//
//    }
//


    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function change(Request $request)

    {

        Log::channel('custom')->info('LangController@change: ' . $request->lang);
        Log::channel('custom')->info('Auth User id:  ' . auth()->user()->id);
        App::setLocale($request->lang);

        session()->put('locale', $request->lang);



        return redirect()->back();

    }
}
