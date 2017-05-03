<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addDistrict(){
        $this->validate(request(), [
            'municipality' => 'required',
            'district' => 'required',
            'region' => 'required',
        ]);

        foreach(District::where('municipality', request('municipality'))->get() as $district){
            if($district->municipality === request('municipality') && $district->municipality === request('municipality') && $district->municipality === request('municipality'))
                return redirect()->back()->with('info', 'Oblast v databázi již existuje.');
        }


        District::create(request()->except('snd'));
        return redirect()->back()->with('success', 'Oblast úspěšně přidána!');
    }
}
