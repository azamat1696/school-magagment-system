<?php

namespace App\Http\Controllers;

use App\Models\ClassGroups;
use Illuminate\Http\Request;

class ClassGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $classgroups = ClassGroups::all();
        return view('class-groups.index',compact('classgroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('class-groups.create');
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
            'name' => 'required|unique:class_groups,name'
        ]);
        ClassGroups::create($validated);
        return redirect()->route('class-groups.index')->with('success','Sınıf başarıyla eklendi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassGroups  $classGroups
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $classGroup = ClassGroups::find($id);
        return view('class-groups.edit',compact('classGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassGroups  $classGroups
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
           'name' => 'required'
        ]);
        $classGroup = ClassGroups::find($id);
        $classGroup->update($validated);
        return redirect()->route('class-groups.index')->with('success','Sınıf Gurubu başarıyla güncellendi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassGroups  $classGroups
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $classGroup = ClassGroups::find($id);
        $classGroup->delete();
        return redirect()->route('class-groups.index')->with('success','Sınıf Gurubu başarıyla silindi');
    }
}
