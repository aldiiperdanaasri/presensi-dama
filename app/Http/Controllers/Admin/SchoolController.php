<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $school = School::find(1);
        return inertia('Admin/School/Index', [
            'school' => $school,
        ]);
    }


    public function edit($id)
    {
        $school = School::find(1);

        return inertia('Admin/School/Edit', [
            'school' => $school,
        ]);
    }

    public function update(Request $request, School $school)
    {
        $request->validate([
            'name'          => 'required|string',
            'address'       => 'required|string',
            'latitude'      => 'required|string',
            'longitude'     => 'required|string',
            'radius_m'      => 'required|string'
        ]);

        $school->update([
            'name'          => $request->name,
            'address'       => $request->address,
            'latitude'      => $request->latitude,
            'longitude'     => $request->longitude,
            'radius_m'      => $request->radius_m
        ]);

        return redirect()->route('admin.school.index');
    }
}
