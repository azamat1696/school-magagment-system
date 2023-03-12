<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $countries = Countries::all();
        Log::channel('info')->info('User is accessing all the Countries', ['user' => auth()->user()->id,'controller' => 'CountriesController@index']);
        return view('countries.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        Log::channel('info')->info('User is  trying   create  Countries', ['user' => auth()->user()->id,'controller' => 'CountriesController@create']);
        return view('countries.create');
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
           'name' => 'required|string'
        ]);
       $country = Countries::create($validated);
        Log::channel('info')->info('User is  trying   create  Countries', ['user' => auth()->user()->id,'controller' => 'CountriesController@store','country' => $country]);
        return redirect()->route('countries.index')->with('success',__('main.country_created_with_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Countries  $countries
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $country = Countries::find($id);
        Log::channel('info')->info('User is  trying   edit  Countries', ['user' => auth()->user()->id,'controller' => 'CountriesController@edit','country' => $country]);
        return view('countries.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Countries  $countries
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);
        $country = Countries::find($id);
        $country->update($validated);
        Log::channel('info')->info('User is  trying   update  Countries', ['user' => auth()->user()->id,'controller' => 'CountriesController@update','country' => $country]);
        return redirect()->route('countries.index')->with('success',__('main.country_updated_with_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Countries  $countries
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $country = Countries::find($id);
        $country->delete();
        Log::channel('info')->info('User is  trying   delete  Countries', ['user' => auth()->user()->id,'controller' => 'CountriesController@destroy','country' => $id]);
        return redirect()->route('countries.index')->with('success',__('main.country_deleted_with_success'));

    }
}
