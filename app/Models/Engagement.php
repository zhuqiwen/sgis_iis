<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Engagement
 */
class Engagement extends Model
{
    protected $table = 'engagements';

    public $timestamps = false;

    protected $fillable = [
        'contact_id',
        'indicator_id',
	    'created_at',
	    'updated_at',
	    'deleted_at'
    ];

    protected $guarded = [];


	public function engagementIndicator()
	{
		return $this->belongsTo('App\Models\EngagementIndicator');
	}

	public function contact()
	{
		return $this->belongsTo('App\Models\Contact');
	}
}