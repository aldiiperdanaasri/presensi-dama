<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function show()
    {
        $school = School::find(1);
        return response(['school' => $school], 200);
    }
}
