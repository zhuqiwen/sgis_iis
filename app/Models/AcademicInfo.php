<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AcademicInfo
 */
class AcademicInfo extends Model
{
    protected $table = 'academic_info';

    public $timestamps = false;

    protected $fillable = [
        'contact_id',
        'field_id',
        'class_year',
        'degree',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $guarded = [];


	public function contact()
	{
		return $this->belongsTo('App\Models\Contact');
	}

	public function studyField()
	{
		return $this->belongsTo('App\Models\StudyField');
	}
}