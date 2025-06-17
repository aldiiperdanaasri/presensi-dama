<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'attendance_type_id',
        'date_time',
        'latlon'
    ];

    public function attendance_type()
    {
        return $this->belongsTo(AttendanceType::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
