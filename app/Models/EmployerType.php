<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployerType
 */
class EmployerType extends Model
{
    protected $table = 'employer_types';

    public $timestamps = false;

    protected $fillable = [
        'type',
	    'created_at',
	    'updated_at',
	    'deleted_at'
    ];

    protected $guarded = [];


	public function employers()
	{
		return $this->hasMany('App\Models\Employer');
	}


}