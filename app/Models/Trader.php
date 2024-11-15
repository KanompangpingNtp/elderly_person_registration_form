<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'trade_type',
        'trade_condition',
        'elderly_name',
        'citizen_id',
        'address',
        'phone_number',
        'status',
        'admin_name_verifier'
    ];

    public function persons()
    {
        return $this->hasMany(Person::class);
    }

    public function personsOptions()
    {
        return $this->hasMany(PersonsOption::class);
    }

    public function attachments()
    {
        return $this->hasMany(FormAttachment::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
