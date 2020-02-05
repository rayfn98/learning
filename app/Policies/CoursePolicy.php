<?php

namespace App\Policies;

use App\Course;
use App\Role;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    public function opt_for_course(User $user, Course $course){
        //Si el usuario no es profesor o no es el que ha creado el curso
        return ! $user->teacher || $user->teacher->id !== $course->teacher_id;
    }
    public function subscribe(User $user){
        return $user->role_id !== Role::ADMIN && ! $user->subscribed('main');
    }
    public function inscribe(User $user, Course $course){
        return ! $course->students->contains($user->student->id);
    }
}
