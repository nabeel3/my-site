<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Adress;
use App\Models\Role;
use Illuminate\Http\Request;
namespace App\Http\Controllers\API;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('getPost','getAdress','getUserRole')->get();
        dd($user->roles);
        $users = User::paginate(5);
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
        ];
        $user =User::create($user);
        $user->role()->attach($request->role);
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
        return view('dashboard.user.edit', compact('user'));
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
          $users = User::find($id);
         $users->name = $request->name;
         $save = $users->save();
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
