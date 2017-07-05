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

	public function isStudent()
	{
		return $this->is_intern_student;
	}

	public function isInternAdmin()
	{
		return $this->is_intern_admin;
	}

	public function isAlumAdmin()
	{
		return $this->is_alum_admin;
	}

	public function isSupervisor()
	{
		return $this->is_intern_supervisor;
	}

	public function hasRole($role)
	{
		switch ($role)
		{
			case "student":
				return $this->isStudent();
			case "supervisor":
				return $this->isSupervisor();
			case "intern_admin":
				return $this->isInternAdmin();
			case "alum_admin":
				return $this->isAlumAdmin();
			default:
				return FALSE;
		}
	}



}
