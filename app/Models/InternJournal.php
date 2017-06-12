<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InternJournal
 */
class InternJournal extends Model
{
    protected $table = 'intern_journals';

    public $timestamps = true;

    protected $fillable = [
        'application_id',
        'journal'
    ];

    protected $guarded = [];

        
}