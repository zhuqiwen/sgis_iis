<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TempCity
 */
class TempCity extends Model
{
    protected $table = 'temp_cities';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'state_id'
    ];

    protected $guarded = [];

        
}