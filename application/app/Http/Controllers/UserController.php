<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
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
        $items = User::all();
        return view('users.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:5',
            'email'=> 'email',
            'password'=>'required|min:6']);
        $data = ['name' => $request->get('name'), 'email'=>$request->get('email'),
            'password'=> Hash::make($request->get('password'))];

        User::create($data);
        return redirect(route('users.index'))->withSuccess('created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $validationRules = [
            'name'=>'required|min:5',
            'email'=> 'required|email|unique:users,email,'.$user->id,
            'password'=>'required|min:6'];

        if ($request->input('password'))
        {
            $request->validate($validationRules );
            $user->password = bcrypt($request->input('password'));
        }else
        {
            unset($validationRules['password']);
            $request->validate($validationRules);
        }
        // 1//password is empty

        // 2// password is not empty
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect(route('users.index'))->with('success', ' updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'))->withSuccess('deleted successfuly');
    }
}
