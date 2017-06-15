<?php
/*
 * this model is NOT USED by authentication.
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 */
class User extends Model
{
    protected $table = 'users';

    public $timestamps = true;

    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'iuid',
        'is_intern_student',
        'is_intern_admin',
        'is_alum_admin',
        'is_intern_supervisor',
        'remember_token'
    ];

    protected $guarded = [];


}