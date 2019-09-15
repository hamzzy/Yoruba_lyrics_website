<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboard extends Controller
{


    public function UpdateUser(Request $request)
    {
        $id=Auth::id();
        $idd=User::findOrFail($id);
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        $idd->update($request->all());

    }


}
