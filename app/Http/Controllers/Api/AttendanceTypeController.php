<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AttendanceType;
use Illuminate\Http\Request;

class AttendanceTypeController extends Controller
{
    public function getAllPresenceTypes()
    {
        $presence_types = AttendanceType::all();

        return response()->json([
            'message' => 'List of presence types',
            'data' => $presence_types,
        ], 200);
    }
}
