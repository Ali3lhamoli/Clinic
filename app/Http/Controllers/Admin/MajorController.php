<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MajorRequest;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::orderBy('id','desc')->get();
        return view("web.admin.sections.majors.index",compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("web.admin.sections.majors.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MajorRequest $request)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->store('/majors','public');
            $data['image'] = 'storage/' . $filename;
        }
        Major::create($data);
        return redirect()->route('admin.majors.index')->with('success', 'Major created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        return view("web.admin.sections.majors.show",compact('major'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
        return view("web.admin.sections.majors.edit",compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MajorRequest $request, Major $major)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            unlink(public_path($major->image));
            $file = $request->file('image');
            $filename = $file->store('/majors','public');
            $data['image'] = 'storage/' . $filename;
        }
        $major->update($data);
        return redirect()->route('admin.majors.index')->with('success', 'Major updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        if($major->image != null){
            unlink(public_path($major->image));
        }
        $major->delete();
        return redirect()->route('admin.majors.index')->with('success', 'Major deleted successfully');
    }

    // private function store_image($request){
    //     $file = $request->file('image');
    //     $filename = $file->store('/majors','public');
    //     $data['image'] = 'storage/' . $filename;
    // }
}
