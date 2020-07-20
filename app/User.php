<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','Avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
//we will not get password field in the result because in User.php we have specified to exclude specific fields
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
////    ---------------MUTATORS------------------
//    public function setPasswordAttribute($value){
//        $this->attributes['password'] = bcrypt($value);
//    }
//    --------------ACCESSORS-----------------
//    public function getNameAttribute($name){
//        return 'My Name is : ' .  ucfirst($name);
//}
    public static function uploadAvatar($image){
        $filename = $image->getClientOriginalName();
        auth()->user()->deleteImage();
        $image->storeAs('images', $filename, 'public');
        auth()->user()->update(['Avatar' => $filename]);
    }

    protected function deleteImage()
    {
        if ($this->Avatar) {

            storage::delete('/public/images/' . $this->Avatar);
//            dd('/public/images/' . $this->Avatar);
        }
    }
    public function todos(){
        return $this->hasMany(Todo::class);
        //return $this->hasMany(App/Todo);
    }
}
