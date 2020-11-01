<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SecurityQuestion extends Model
{
    use HasFactory;

    protected $table = 'security_questions';
    protected $primaryKey = "id_question";
    public $timestamps = false;
    protected $fillable = [
        'nom_question'
    ];
    protected $hidden = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];

}
