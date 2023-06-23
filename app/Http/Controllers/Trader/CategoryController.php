<?php

namespace App\Http\Controllers\Trader;


use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        //
       $section= Category::paginate(10);
return view('Admin.section.index',['Section'=>$section]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Admin.section.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated=$request->validate([
            'name'=>'required'
        ]);
        Category::create($validated);
        return redirect('section');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $name=Category::find($id)->name;
        return view('Admin.section.edit',['id'=>$id,'name'=>$name]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated=$request->validate([
            'name'=>'required'
        ]);
        Category::find($id)->update([
            'name'=>$validated['name'],

        ]);
        return redirect('section');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Category::destroy($id);
return redirect('admin/section');
    }
}
