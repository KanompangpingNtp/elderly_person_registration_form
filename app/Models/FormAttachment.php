<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['trader_id', 'file_path', 'file_type'];

    public function trader()
    {
        return $this->belongsTo(Trader::class);
    }
}
