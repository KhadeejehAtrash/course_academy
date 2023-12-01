<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Course extends Model
{

    use HasTranslations;
    public $translatable = ['Name'];

    protected $fillable=['Name','Notes'];
    protected $table = 'Courses';
    public $timestamps = true;

    public function Students()
    {
        return $this->hasMany('App\Models\Student', 'Student_id');
    }
}
