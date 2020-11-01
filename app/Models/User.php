<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = "id_user";
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'name_user',
        'prenom_user',
        'email_user',
        'is_active_user',
        'verify_token_user',
        'password_user',
        'password_reset_token_user',
        'id_permission',
        'id_question',
        'reponse_question_user'
    ];
    protected $hidden = [
        'password',
        'remember_token',
        'deleted_at'
    ];

    /*protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/

    public function permission()
    {
        return $this->hasOne('App\Models\Permission');
    }

    public function security_question()
    {
        return $this->hasOne('App\Models\SecurityQuestion');
    }

    public function getAuthPassword()
    {
        return $this->attributes['password_user'];
    }

}
