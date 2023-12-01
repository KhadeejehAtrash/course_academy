<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use SoftDeletes;

    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded =[];

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }




}
