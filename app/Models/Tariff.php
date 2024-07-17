<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    use HasFactory;

    protected $fillable = ['apartment_id', 'type', 'start_date', 'end_date', 'value'];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
