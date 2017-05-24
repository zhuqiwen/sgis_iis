<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EngagementIndicator
 */
class EngagementIndicator extends Model
{
    protected $table = 'engagement_indicators';

    public $timestamps = false;

    protected $fillable = [
        'name',
	    'created_at',
	    'updated_at',
	    'deleted_at'
    ];

    protected $guarded = [];


	public function engagements()
	{
		return $this->hasMany('App\Models\Engagement');
	}
}