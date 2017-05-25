<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

/**
 * Class Contact
 */
class Contact extends Model
{
    protected $table = 'contacts';

    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone_home',
        'phone_mobile',
        'address_country',
        'address_state',
        'address_city',
        'address_line1',
        'address_line2',
        'address_zip',
        'no_email',
        'no_phone_call',
        'no_mail',
        'iuaa_member',
        'share_with_iuaa',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $guarded = [];


	/**
	 * relationships
	 */

	/**
	 * one to many
	 */

	public function academicInfo()
	{
		return $this->hasMany('App\Models\AcademicInfo');
	}

	public function engagements()
	{
		return $this->hasMany('App\Models\Engagement');
	}

	public function eventAttendance()
	{
		return $this->hasMany('App\Models\EventAttendance');
	}

	// a contact may have multiple employments, but only the one with null of deleted_at is the current one.
	// to update one's employment info, we should soft delete previous one and insert a new record
	public function employments()
	{
		return $this->hasMany('App\Models\Engagement');
	}




	/**
	 * many to many
	 */

	public function events()
	{
		return $this->belongsToMany('App\Models\Event', 'event_attendance')->withTimestamps();
	}

	public function employers()
	{
		return $this->belongsToMany('App\Models\Employer', 'employments')->withPivot('job_title', 'country', 'state', 'city')->withTimestamps();
	}

	public function engagementIndicators()
	{
		return $this->belongsToMany('App\Models\EngagementIndicator', 'engagements', 'contact_id', 'indicator_id')->withTimestamps();
	}

	public function studyFields()
	{
		return $this->belongsToMany('App\Models\StudyField', 'academic_info', 'contact_id', 'field_id')->withPivot('class_year', 'degree')->withTimestamps();
	}



}