<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';
    protected $primaryKey = "id_permission";
    public $timestamps = false;
    protected $fillable = [
        'nom_permission'
    ];
    protected $hidden = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];
}
