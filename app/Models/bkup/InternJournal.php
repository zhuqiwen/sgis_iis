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
        'internship_id',
        'journal',
        'serial_num',
        'required_total_num',
        'due_date',
        'is_submitted'
    ];

    protected $guarded = [];

        
}