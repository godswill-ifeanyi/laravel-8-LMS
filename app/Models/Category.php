<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'status',
        'created_by'
    ];

    public function courses() {
        return $this->hasMany(Course::class, 'category_id', 'id');
    }
}
