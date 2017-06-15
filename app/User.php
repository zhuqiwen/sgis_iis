<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];

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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
