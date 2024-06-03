<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_email',
        'service_id',
        'reservation_time',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
