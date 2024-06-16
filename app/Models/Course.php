<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Course;
use App\Models\CourseDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory; 

    protected $table = 'courses';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'image',
        'short_description',
        'description',
        'level',
        'requirements',
        'outcome',
        'discount_price',
        'original_price',
        'yt_iframe',
        'meta_description',
        'meta_keywords',
        'meta_title',
        'top_course',
        'free_course',
        'created_by',
        'status',
        'created_by'
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function course_details() {
        return $this->hasMany(CourseDetail::class, 'id', 'course_id');
    }

    /* public function comments() {
        return $this->hasMany(Comment::class, 'post_id', 'id')->orderBy('created_at','DESC');
    } */
}
