<?php

namespace App\Http\Controllers;

use App\Models\ClassGroups;
use App\Models\MyClass;
use Illuminate\Http\Request;

class MyClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $items = MyClass::with('class_group')->get();
        return view('my-class.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $items = ClassGroups::all();
       return view('my-class.create',compact('items'));
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
           'name' => 'required|string',
           'class_group_id' => 'required'
        ]);
        MyClass::create($validated);
        return redirect()->route('classes.index')->with('success','Sınıf başarıyla oluşturuldu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $item = MyClass::find($id);
        $classGroups = ClassGroups::all();
        return view('my-class.edit',compact('item','classGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'class_group_id' => 'required'
        ]);
        $item = MyClass::find($id);
        $item->update($validated);
        return redirect()->route('classes.index')->with('success','Sınıf başarıyla güncellendi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
         MyClass::destroy($id);
         return redirect()->route('classes.index')->with('success','Sınıf başarıyla silindi');

    }
}
