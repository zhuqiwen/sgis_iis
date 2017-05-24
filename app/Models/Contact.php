<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

/**
 * Class Contact
 */
class Contact extends Model
{
    protected $table = 'contacts';

    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone_home',
        'phone_mobile',
        'address_country',
        'address_state',
        'address_city',
        'address_line1',
        'address_line2',
        'address_zip',
        'no_email',
        'no_phone_call',
        'no_mail',
        'iuaa_member',
        'share_with_iuaa',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $guarded = [];


	public function academicInfo()
	{
		return $this->hasMany('App\Models\AcademicInfo');
	}

}