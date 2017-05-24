<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employer
 */
class Employer extends Model
{
    protected $table = 'employers';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'web_address',
        'type_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $guarded = [];


}