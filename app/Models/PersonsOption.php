<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonsOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'trader_id',
        'welfare_type',
        'welfare_other_types',
        'request_for_money_type',
        'document_type',
    ];

    public function trader()
    {
        return $this->belongsTo(Trader::class);
    }
}
