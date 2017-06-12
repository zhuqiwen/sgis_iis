<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InternSupervisor
 */
class InternSupervisor extends Model
{
    protected $table = 'intern_supervisors';

    public $timestamps = true;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'prefix',
        'email',
        'phone',
        'organization_id'
    ];

    protected $guarded = [];

        
}