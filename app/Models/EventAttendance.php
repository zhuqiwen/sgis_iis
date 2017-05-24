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


}