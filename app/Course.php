<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Course
 *
 * @property int $id
 * @property int $teacher_id
 * @property int $category_id
 * @property int $level_id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property string|null $picture
 * @property string $status
 * @property int $previous_approved
 * @property int $previous_rejected
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course wherePreviousApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course wherePreviousRejected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Course extends Model
{
    //
    const PUBLISHED = 1;
    const PENDING = 2;
    const REJECTED = 3;

    protected $whitCount = ['reviews', 'students'];//Cantidad de revisiones y cursos

    public function pathAttachment(){
        return "/storage/courses/". $this->picture;
    }

    public function getRouteKeyName(){
        //Nombre para la ruta, para que aparezce en vez del id
        return 'slug';
    }

    public function category(){
        //Por defecto devuelve todo, por eso se pone el select() con los campos que se desea
        return $this->belongsTo(Category::class)->select('id', 'name');
    }
    public function goals(){
        //Cuando se establece una relacion, si o si se llama en el select a la PK y las FKs
        return $this->hasMany(Goal::class)->select('id', 'course_id', 'goal');
    }
    public function level(){
        return $this->belongsTo(Level::class)->select('id', 'name');
    }
    public function reviews(){
        return $this->hasMany(Review::class)->select('id', 'user_id', 'course_id', 'rating', 'comment', 'created_at');
    }
    public function requirements(){
        return $this->hasMany(Requirement::class)->select('id', 'course_id', 'requirement');
    }
    //Muchos a muchos
    public function students(){
        return $this->belongsToMany(Student::class);        
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function relatedCourses($course){
        return Course::with('reviews')->whereCategoryId($this->category->id)
            ->where('id', '!=', $this->id)
            ->latest()
            ->limit(6)
            ->get();    
    }
}
