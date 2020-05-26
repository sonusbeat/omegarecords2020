<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use \Czim\Listify\Listify;

    public function __construct(array $attributes = array(), $exists = false) {

        parent::__construct($attributes, $exists);

        $this->initListify();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'teacher_id',
        'title',
        'permalink',
        'image',
        'image_alt',
        'description',
        'video',
        'overview',
        'topics',
        'content',
        'position',
        'price',
        'start_date',
        'duration',
        'seo_title',
        'seo_description',
        'seo_robots',
        'active',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'start_date',
    ];

    /**
     * Set the image slug.
     *
     * @param string $value
     * @return void
     */
    public function setPermalinkAttribute($value)
    {
        $this->attributes['permalink'] = strtolower(str_replace(' ', '-', str_replace('.', '', $value)));
    }

    /**
     * Get the courses with teacher associated for public
     *
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public static function CoursesWithTeacher()
    {
        return self::with(['teacher' => function($query) {
            $query->select('id', 'first_name', 'last_name');
        }])
        ->select('teacher_id', 'title', 'permalink', 'description', 'image', 'image_alt', 'duration', 'start_date')
        ->where('active', true)
        ->paginate(8);
    }

    /**
     * Get the course with teacher associated for public
     *
     * @param string $permalink
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public static function PublicCourseWithTeacher($permalink)
    {
        return self::with(['teacher' => function($query) {
            $query->select(['id', 'first_name', 'last_name', 'image', 'image_alt', 'biography'])->first();
        }])
        ->where('permalink', $permalink)
        ->select(['id', 'teacher_id', 'title', 'image', 'image_alt', 'description', 'video', 'overview', 'topics', 'content', 'price', 'start_date', 'duration', 'seo_title', 'seo_description', 'seo_robots'])
        ->first();
    }

    /**
     * Get the course with teacher for admin
     *
     * @param integer $id
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public static function CourseWithTeacher($id)
    {
        return self::with(['teacher' => function($query) {
            $query->select(['id', 'first_name', 'last_name'])->first();
        }])
        ->where('id', $id)->first();
    }

    /**
     * Get the teacher that owns the course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * Seo Options for form
     *
     * @return array
     */
    public static function seo_options()
    {
        return [
            'Indexar y Seguir' => 'index, follow',
            'No Indexar y Seguir' => 'noindex, follow',
            'Indexar y No Seguir' => 'index, nofollow',
            'No Index y No Seguir' => 'noindex, nofollow'
        ];
    }
}
