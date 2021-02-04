<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Cache;
use App\Http\Middleware\Userstatus;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(5);
        return view('template_admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::paginate(5);

        return view('template_admin.users.create')->with('users',$users);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'type' => 'required',


        ]);

        if ($request->input('password')) {
                      
            $password = Hash::make($request->password);

        }else{

            $password = Hash::make('12345');

        }
         
        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'password' => $password

        ]); 

        return redirect()->route('user.index')->with('Success','User Cretaed Successfully');

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
    public function edit($id)
    {
        $user= User::find($id);

        return view('template_admin.users.edit')->with('user',$user);


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
        $this->validate($request,[

            'name' => 'required|min:3|max:100',
            // 'email' => 'required|email',
            'type' => 'required',


        ]);

        if ($request->input('password')){

            $update_user = [
    
                'name' => $request->name,
                'type' => $request->type,
                'password' => Hash::make($request->password)
            ];

        }else{

            $update_user = [
    
                'name' => $request->name,
                'type' => $request->type,
            ];

        }
        $user= User::find($id);

        $user->update($update_user);

        return redirect()->route('user.index')->with('Success','User Edited Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::findOrFail($id);
        
        $user->delete();

        return redirect()->route('user.index')->with('Success','User Deleted Successfully');


    }

    public function count(){

        $usersCount = User::all()->count();

        return view('home')->with('usersCount',$usersCount);
    }

    public function userOnlineStatus()
    {
        $users = User::all();
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo $user->name . " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
            else
                echo $user->name . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
        }
    }

}
