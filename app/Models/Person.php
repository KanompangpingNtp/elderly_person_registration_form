<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'trader_id',
        'written_at',
        'written_date',
        'salutation',
        'first_name',
        'last_name',
        'birth_day',
        'age',
        'nationality',
        'house_number',
        'village',
        'alley',
        'road',
        'subdistrict',
        'district',
        'province',
        'postal_code',
        'phone_number',
        'citizen_id',
        'marital_status'
    ];

    public function trader()
    {
        return $this->belongsTo(Trader::class);
    }
}
