<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EventAttendance
 */
class EventAttendance extends Model
{
    protected $table = 'event_attendance';

    public $timestamps = false;

    protected $fillable = [
        'contact_id',
        'event_id',
	    'created_at',
	    'updated_at',
	    'deleted_at'
    ];

    protected $guarded = [];

	public function event()
	{
		return $this->belongsTo('App\Models\Event');
	}

	public function contact()
	{
		return $this->belongsTo('App\Models\Contact');
	}

}