<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InternReflection
 */
class InternReflection extends Model
{
    protected $table = 'intern_reflections';

    public $timestamps = true;

    protected $fillable = [
        'internship_id',
        'reflection',
        'due_date',
        'is_submitted'
    ];

    protected $guarded = [];


    public function getAvailable($internship_id)
    {
        return $this->where('internship_id', $internship_id)
            ->where('is_submitted', 0)
            ->get();
    }
}