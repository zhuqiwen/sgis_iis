<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
/**
 * Class TempCity
 */
class TestAutocomplete extends Model
{
	protected $table = 'test_autocomplete';

	public $timestamps = false;

	protected $fillable = [
		'title',
		'description'
	];

	protected $guarded = [];


}