<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        //isAdmin middleware lets only users with a //specific permission permission to access these resources
//        $this->middleware(['auth', 'isAdmin']);
    }

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
        $roles=Role::get();
        //dd($roles);['roles'=>'$roles']
        return view('users.create',compact('roles'));
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
        //$user = ['name' => $request->get('name'), 'email'=>$request->get('email'),
            //'password'=> Hash::make($request->get('password'))];
        $user = User::create(['name' => $request->get('name'), 'email'=>$request->get('email'),
            'password'=> Hash::make($request->get('password'))]);
        //($request->only('email', 'name', 'password')); //Retrieving only the email and password data

       // User::create($data);
        $roles = $request['roles'];
        if (isset($roles)) {
            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r); //Assigning role to user
            }
        }
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
        $roles = Role::get(); //Get all roles

        return view('users.edit', compact('user','roles'));
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
        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        }
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }
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
        try {
            $user->delete();
            return redirect(route('users.index'))->withSuccess('deleted successfully');
        }catch (\Exception $ex){
            return redirect(route('users.index'))->withError('can not delete related record');
        }
    }
}
