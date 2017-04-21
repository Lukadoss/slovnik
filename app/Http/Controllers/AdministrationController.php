<?php

namespace App\Http\Controllers;

use App\District;
use App\District_administration;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function authUser($id){
        $user = User::findOrFail($id);
        $user->auth_level = 1;
        $user->save();

        return redirect()->back()->with('success', 'Uživateli "' . $user->name . '" byla schválena registrace.');
    }

    public function editUser($id){
        $user = User::findOrFail($id);
        $towns = District::all();
        return view('user.settings', compact('user', 'towns'));
    }

    public function deleteUser($id){
        if (Hash::check(request('password'), auth()->user()->password)) {
            $name = User::findOrFail($id)->name;
            User::destroy($id);
            return redirect()->back()->with('info', 'Uživatel "' . $name . '" smazán.');
        }
        return redirect()->back();
    }

    public function deleteDistrict($id){
        if (Hash::check(request('password'), auth()->user()->password)) {
            District::destroy($id);
        }
        return redirect()->back();
    }

    public function showUserDistrict($id){
        $user = User::findOrFail($id);
        $towns = District::distinct()->select('region')->get();
        return view('auth.distSettings', compact('user', 'towns'));
    }

    public function addUserDistrict(){
        $selected = explode(',', request('region_name'));
        foreach ($selected as $item){
            foreach (District::where('region', $item)->get() as $district){
                District_administration::create([
                    'user_id' => request('user_id'),
                    'district_id' => $district->id
                ]);
            }
        }
        return redirect('/members')->with('success', 'Uživateli nyní spravuje vybrané oblasti.');
    }
}
