<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    const VIDEO_SIZE_WIDTH = '100%';
    const VIDEO_SIZE_HEIGHT = '100%';

    private $video_path = '\storage\VMS\videos/';
    private $thumbnail_path = '\storage\VMS\thumbnail/';

    protected $table = 'class_lessons';

    use Sluggable, SoftDeletes;

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

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function getVideoAttribute()
    {
        return $this->video_path.$this->attributes['video'];
    }
    public function getThumbnailAttribute()
    {
        return $this->thumbnail_path.$this->attributes['thumbnail'];
    }


}
