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

        District::create(request()->all());
        return redirect()->back()->with('success', 'Oblast úspěšně přidána!');
    }
}
