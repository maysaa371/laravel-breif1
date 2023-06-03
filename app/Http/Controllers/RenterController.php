<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Farm;

class RenterController extends Controller
{
    public function index()
    {
        $farms = Farm::paginate(9);
        return view('RenterDashboard.renter', compact('farms'));
    }
    public function edit($id)
    {
        $farm = Farm::find($id);

        return view('RenterDashboard.edit',compact('farm'));
    }
}
