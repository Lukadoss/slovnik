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

    public function authUser($id)
    {
        $user = User::findOrFail($id);
        $user->auth_level = 1;
        $user->save();

        return redirect()->back()->with('success', 'Uživateli "' . $user->name . '" byla schválena registrace.');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $towns = District::all();
        return view('user.settings', compact('user', 'towns'));
    }

    public function deleteUser($id)
    {
        if (Hash::check(request('password'), auth()->user()->password)) {
            $name = User::findOrFail($id)->name;
            User::destroy($id);
            return redirect()->back()->with('info', 'Uživatel "' . $name . '" smazán.');
        }
        return redirect()->back();
    }

    public function deleteDistrict($id)
    {
        if (Hash::check(request('password'), auth()->user()->password)) {
            District::destroy($id);
        }
        return redirect()->back();
    }

    public function showUserDistrict($id)
    {
        $user = User::findOrFail($id);
        $towns = District::distinct()->select('region')->get();
        $checked = $user->districtAdmin();
        return view('auth.distSettings', compact('user', 'towns', 'checked'));
    }

    public function addUserDistrict()
    {
        $selected = explode(',', request('region_name'));
        $user = User::findOrFail(request('user_id'));
        $checked = array();

        foreach ($user->districtAdmin() as $district) {
            $checked[] = $district->region;
        }

        if (count($checked) > 0) {
            for ($i = 0; $i < count($selected); $i++) {
                for ($j = 0; $j < count($checked); $j++) {
                    if ($checked[$j] === $selected[$i]) {
                        unset($selected[$i]);
                        unset($checked[$j]);
                        $selected = array_values($selected);
                        $checked = array_values($checked);
                        $i--;
                        break;
                    }elseif ($selected[$i]===''){
                        unset($selected[$i]);
                        $i--;
                        break;
                    }
                }
            }
        }

        foreach ($selected as $item) {
            District_administration::create([
                'user_id' => request('user_id'),
                'district_id' => District::groupBy('region')->having('region', '=', $item)->first()->id
            ]);
        }

        foreach ($checked as $item) {
            District_administration::where('district_id', District::groupBy('region')->having('region', '=', $item)->first()->id)->where('user_id', $user->id)->delete();
        }


        return redirect('/members')->with('success', 'Uživateli nyní spravuje vybrané oblasti.');
    }

    public function getWaitingUsers(){
        return User::all('id', 'name', 'email', 'auth_level')->where('auth_level', '0')->count();
    }
}
