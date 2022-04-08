<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LecturerStoreRequest;

class lecturers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Users = User::all();
      return view('Admin.index',compact('Users')); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Admin.create'); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LecturerStoreRequest $request)
    {
        $image = $request->file('image')->store('public');
        User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->password,
        'employee_id'=>$request->employee_id,
        'image'=>$image,

        ]);
        return to_route("Admin.index");// //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
       return view("admin.edit",compact("User")); //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'unique:users'],
            'employee_id' => ['required', 'string', 'max:15', 'unique:users'],
            'image'=> ['required','image']
        ]);//
        $image = $User->image;
        if($request->hasFile('image')){
            storage::delete($User->image);
            $image = $request->file('image')->store('public/categories');
        }
        $User->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'employee_id'=>$request->employee_id,
            'image'=>$image,
        ]);
        return to_route('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        storage::delete($User->image);
        $User->delete();
        return to_route('');//
    }
}
