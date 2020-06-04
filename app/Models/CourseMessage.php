<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseMessage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'name',
        'email',
        'whatsapp',
        'message',
    ];

    /**
     * Get the course to the message
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
