<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReparingBill extends Model
{
    use HasFactory;

    protected $fillable = [
        'current_reapring_id',
        'bill_status',
        'amount',
        'bill_date',
        'is_final'
    ];
}
