<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPurchase extends Model
{

    public function courses()
    {
        return $this->belongsTo(CourseSlug::class, 'course_slug_id', 'id');
    }
}
