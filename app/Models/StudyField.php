<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StudyField
 */
class StudyField extends Model
{
    protected $table = 'study_fields';

    public $timestamps = false;

    protected $fillable = [
        'field',
        'created',
        'modified',
        'deleted'
    ];

    protected $guarded = [];


	public function academicInfo()
	{
		return $this->hasMany('App\Models\AcademicInfo');
	}

}