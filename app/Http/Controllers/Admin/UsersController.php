<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{

    public function index()
    {
        $users=User::all();
       return view('admin.users.index',['users'=>$users]);
    }



    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
       $this->validate($request,[
           'name'=>'required',
           'email'=>'required|email|unique:users',
           'password'=>'required',
           'avatar' => 'nullable|image'
       ]);

      $user=User::add($request->all());
      $user->generatePassword($request->get('password'));
      $user->uploadAvatar($request->file('avatar'));

      return redirect()->route('users.index');

    }




    public function edit($id)
    {
        $user=User::find($id);
        return  view('admin.users.edit',['user'=>$user]);
    }


    public function update(Request $request, $id)
    {
        $user=User::find($id);       //save edit  email current users


        $this->validate($request,[
            'name' => 'required',
            'email' => [
                'required',
                 'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'avatar' => 'nullable|image'
        ]);





       $user->edit($request->all());
       $user->generatePassword($request->get('password'));
       $user->uploadAvatar($request->file('avatar'));

       return redirect()->route('users.index');
    }


    public function destroy($id)
    {

        User::find($id)->remove();

        return redirect()->route('users.index');



    }
}
