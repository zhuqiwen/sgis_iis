<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employer
 */
class Employer extends Model
{
    protected $table = 'employers';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'web_address',
        'type_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $guarded = [];


	public function employments()
	{
		return $this->hasMany('App\Models\Employment');
	}

	public function type()
	{
		return $this->belongsTo('App\Models\EmployerType');
	}


	public function contacts()
	{
		return $this->belongsToMany('App\Models\Contact', 'employments')->withPivot('job_title', 'country', 'state', 'city')->withTimestamps();
	}
}