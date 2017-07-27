<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class State
 */
class State extends Model
{
    protected $table = 'states';

    public $timestamps = true;

    protected $fillable = [
        'country_id',
        'region',
        'code',
        'admin_code'
    ];

    protected $guarded = [];

        
}