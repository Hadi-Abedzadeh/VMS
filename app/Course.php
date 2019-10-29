<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
class Course extends Model
{


    protected $table = 'class_courses';
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPriceAttribute($value)
    {
        if($value == 0 OR $value == null){
            return trans('ui.text.free');
        }else{
            return number_format($value);
        }
    }


    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }




}
