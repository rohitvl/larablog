<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        //One role can many users, so we have assigned the inverse one to many relation in inverse way.
        return $this->belongsTo('App\Role');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    //setter for hashing the passwords
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }


    //custom method to check whether the user is admin or not
    public function isAdmin(){

        if($this->role->name == 'administrator' && $this->is_active==1){
            return true;
        }

        return false;

    }


    public function isAdminOnly(){

        if($this->role->name == 'administrator'){
            return true;
        }

        return false;

    }


    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

}
