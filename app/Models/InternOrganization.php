<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InternOrganization
 */
class InternOrganization extends Model
{
    protected $table = 'intern_organizations';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'url'
    ];

    protected $guarded = [];

        
}