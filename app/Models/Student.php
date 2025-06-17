<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'class',
        'face_embedding',
        'image_url'
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
