<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\role;
use Illuminate\Support\Facades\Hash;

class UserManagement extends Controller
{
    public function index()
    {
       
        return view('dashboard.usermanage',[
            "users"=>User::all()
        ]);
    }

    public function form()
    {
        return view('dashboard.usermanages.index');
       
    }
    public function store(Request $request)
    {
        $validateData =  $request->validate([
            'username'=>['required','min:3','max:50','unique:users'],
            'email'=>['email','required','min:3','max:50','unique:users'],
            'role'=>['required','min:3','max:50','unique:users'],
            'password'=>'required|max:50'
        ]);
        $validateData['password'] =Hash::make($validateData['password']);
        $validateData1 =  $request->validate([
            'email'=>['email','required','min:3','max:50','unique:users'],
            'role'=>['required','min:3','max:50','unique:users'],
           
        ]);
       

        User::create($validateData);

        role::create([
            'role_name' =>  $validateData1['role'],
            'role_description' => $validateData1['email'],
        ]);
       
        return redirect('/user-management')->with('succes','Registration acount username '.$validateData['username'].' succesfull');
    }

     public function destroy($email)
    {   
        
        
        DB::table('users')->where('email', '=',$email)->delete();
        DB::table('roles')->where('role_description', '=',$email)->delete();
        return redirect('/user-management')->with('danger','User has been deleted');

    }
    public function showupdate($email)
    {
        return view('dashboard.usermanages.edit',[
            "users"=> DB::table('users')->select('*')->where('email', '=',$email)->first()
        ]);
       
    }

    public function update(Request $request )
    {
        $rules =[];
        $rules1 =[];

        $users = DB::table('users')->where('id', '=',$request->id)->get();
       
        $users1 = DB::table('roles')->where('role_name', '=',$users[0]->role)->get();
     
        if ($users[0]->username != $request->username) {
           $rules['username'] =  'unique:users';
        }
        if ($users[0]->email != $request->email) {
            $rules['email'] =  'unique:users';
            $rules1['role_description'] =  $request->email;
        }
        if ($users[0]->role != $request->role) {
            $rules1['role_name'] =  $request->role;
            $rules['role'] =  'unique:users';
        }
        $validateData = $request->validate($rules);
        if ( $request->password != 0) {
            $validateData['password'] = Hash::make($request->password);
        }
       
        role::where('id',$users1[0]->id)->update($rules1);
        User::where('id',$request->id)->update($validateData);
       
        return redirect('/user-management')->with('succes','uppdate acount  succesfull');

    }


}
