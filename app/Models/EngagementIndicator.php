<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EngagementIndicator
 */
class EngagementIndicator extends Model
{
    protected $table = 'engagement_indicator';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'created',
        'modified',
        'deleted'
    ];

    protected $guarded = [];

        
}