<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;
    protected $table = 'company_infos'; // Specify the correct table name if needed

    protected $fillable = [
        'phone_number',
        'email',
        'details',
        'address',
        'address_map_link',
    ];
}
