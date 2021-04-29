<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(6);
        return view("admin.users",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status="add";
        return view('admin.users-form', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'email|required',
            'password'=> 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            
        ]);
            
        $request = request()->all();

        if(isset($request['image'])){
            $request['image'] = Storage::put('users',$request['image']);
        }

        $request['password']=Hash::make($request['password']);

        User::create($request);

        session()->flash('message', 'User Created');
        return redirect()->route('admin.users.index');
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
    public function edit(User $user)
    {
        $status="edit";
        return view('admin.users-form', compact('user','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'email|required',
            'password'=> 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            
        ]);
            
        $request = request()->all();

        if(isset($request['image'])){
            $request['image'] = Storage::put('users',$request['image']);
        }

        $request['password']=Hash::make($request['password']);

        $user->fill($request)->save();


        session()->flash('message', 'User Updated');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('message', 'User Deleted');
        return redirect()->route('admin.categories.index');
    }
}
