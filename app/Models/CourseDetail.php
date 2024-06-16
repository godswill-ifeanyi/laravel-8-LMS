<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
    use HasFactory;

    protected $table = 'course_details';

    protected $fillable = [
        'class_url',
        'file_path',
        'notes',
        'datetime',
    ];

    /* public function course() {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    } */
}
