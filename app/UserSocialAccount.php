<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSocialAccount extends Model
{   
    //Para la asignación masiva mediatne el create,  Contrario es warded
    protected $fillable = ['user_id', 'provider', 'provider_uid'];

    public $timestamps = false; //Cuando no tienen columnas timestamps poner esto

    public function User(){
        return $this->belongsTo(User::class);
    }
}
