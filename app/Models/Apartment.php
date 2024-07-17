<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'type', 'city'];

    public function tariffs()
    {
        return $this->hasMany(Tariff::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
