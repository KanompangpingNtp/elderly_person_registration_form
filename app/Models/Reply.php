<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = ['trader_id', 'user_id', 'reply_text', 'reply_date'];

    public function trader()
    {
        return $this->belongsTo(Trader::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
