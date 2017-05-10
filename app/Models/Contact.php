<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 */
class Contact extends Model
{
    protected $table = 'contact';

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
        'created',
        'modified',
        'deleted'
    ];

    protected $guarded = [];

        
}