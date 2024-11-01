<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')
             ->whereHas('role', function ($query) {
                 $query->where('is_maneger', 0);
             })
             ->orderBy('id', 'desc')
             ->paginate(5);
        return view("web.admin.sections.users.index",compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("web.admin.sections.users.create");
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->except('role');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->store('/users','public');
            $data['image'] = 'storage/' . $filename;
        }
        $the_role = $request->input('role');

        if($the_role == 'doctor'){
            $role['is_doctor'] = 1;
        }elseif($the_role == 'admin'){
            $role['is_admin'] = 1;
        }else{
            $role['is_patient'] = 1;
        }

        $user = User::create($data);
        $user->role()->create($role);
        
        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $role = Role::where('user_id',$user->id)->get();
        return view("web.admin.sections.users.show",compact('user','role'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user_role = Role::where('user_id',$user->id)->get();
        return view("web.admin.sections.users.edit",compact('user','user_role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->except('role');
        if($request->hasFile('image')){
            if($user->image){
                unlink(public_path($user->image));
            }
            $file = $request->file('image');
            $filename = $file->store('/users','public');
            $data['image'] = 'storage/' . $filename;
        }
        $the_role = $request->input('role');

        if($the_role == 'doctor'){
            $role = ['is_doctor' => 1, 'is_admin' => 0, 'is_patient' => 0];
        }elseif($the_role == 'admin'){
            $role = ['is_doctor' => 0, 'is_admin' => 1, 'is_patient' => 0];
        }else{
            $role = ['is_doctor' => 0, 'is_admin' => 0, 'is_patient' => 1];
        }

        $user->update($data);
        $user->role()->update($role);
        
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->image != null){
            unlink(public_path($user->image));
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success','User deleted successfully');
    }
}
