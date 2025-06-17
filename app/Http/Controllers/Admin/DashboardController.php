<?php

namespace App\Http\Controllers\Admin;

use App\Models\Exam;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\ExamSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return inertia('Admin/Dashboard/Index', []);
    }
}
