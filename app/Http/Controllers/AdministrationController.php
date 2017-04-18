<?php

namespace App\Http\Controllers;

use App\Districts;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function editUser($id){
        $user = User::find($id);
        $towns = Districts::all();
        if($user===null) return redirect()->back();
        return view('user.settings', compact('user', 'towns'));
    }

    public function deleteUser($id){
        if (Hash::check(request('password'), auth()->user()->password)) {
            User::destroy($id);
        }
        return redirect()->back();
    }

    public function deleteDistrict($id){
        if (Hash::check(request('password'), auth()->user()->password)) {
            Districts::destroy($id);
        }
        return redirect()->back();
    }

    public function addDistrict(){
        $this->validate(request(), [
            'municipality' => 'required',
            'district' => 'required',
            'region' => 'required',
        ]);

        Districts::create(request()->all());
        return redirect()->back();
    }
}
