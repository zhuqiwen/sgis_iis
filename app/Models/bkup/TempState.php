<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TempState
 */
class TempState extends Model
{
    protected $table = 'temp_states';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'country_id'
    ];

    protected $guarded = [];

        
}