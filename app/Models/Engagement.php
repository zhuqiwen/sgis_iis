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
        'created',
        'modified',
        'deleted'
    ];

    protected $guarded = [];


}