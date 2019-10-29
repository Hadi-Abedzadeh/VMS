<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseSlug extends Model
{
    const FREE_PRICE = 0;
    const COURSE_FREE = 1;

    const imageStoragePath = '/storage/VMS/images/';
    const videoStoragePath = '/storage/VMS/videos/';


    protected $table = 'course_slug';

    use SoftDeletes, Sluggable;

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

    public function getImageAttribute()
    {
        return self::imageStoragePath . $this->attributes['image'];
    }

}
