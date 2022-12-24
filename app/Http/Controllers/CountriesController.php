<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use Illuminate\Http\Request;

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
        return view('countries.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
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
        Countries::create($validated);
        return redirect()->route('countries.index')->with('success','Ülke başarıyla eklendi');
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
        return redirect()->route('countries.index')->with('success','Ülke başarıyla güncellendi');
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
        return redirect()->route('countries.index')->with('success','Ülke başarıyla silindi');

    }
}
