<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Adress;


use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $users = User::all();

//        $user = User::with('getPost','getAdress','getUserRole')->get();

//        $users = User::paginate(5);
        return view('dashboard.users.index', compact('users'));

    }
    public function list()
    { 
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $roles = User::find(2)->roles()->orderBy('name')->get();
//
//
//        foreach ($roles as $role) {
//            dd($role->user);
//            //
//        }
//        $user = User::find(1);
//
//        foreach ($user->roles as $role) {
//            dd($role);
//        }

//        $roles = User::find(1)->roles()->orderBy('name')->get();
//
//
//
//
//        foreach ($roles as $role) {
//            dd($role->name);
//
//        }
//        $roles = User::find(1)->roles()->orderBy('name')->get();
//        dd($roles);








        $roles = Role::all();

         return view('dashboard.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $user = [
            'name' => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'contact_no' => ($request->contact),

        ];

            $user = User::create($user);
            $roleId = $request->roles;
            $user->roles()->attach($roleId);
        if ($user) {
            return redirect()->route('users.index');
            # code...
        }





 

        //  $users = new User();
        // $users->name = $request->name;
        // $save = $users->save();
        // if ($save) {
        //     return redirect()->route('users.index');
        //     # code...
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        $roles = Role::all();
        return view('dashboard.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $user = User::find($id);


         $user->name = $request->name;
        $user->email = $request->email;
        $user->contact_no = $request->contact;


        $save = $user->save();

        $user->roles()->sync($request->roles);
        if ($save) {
            return redirect()->route('users.index');
            # code...
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = User::find($id)->delete();
        return redirect()->route('users.index');
    }
}
