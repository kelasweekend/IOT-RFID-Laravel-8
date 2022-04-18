<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uid_user extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'amount',
    ];
}
