<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Debit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code',
        'amount',
        'limit',
        'security'
    ];

    public function getData()
    {
        return DB::table('debits')->join('users', 'debits.user_id', '=', 'users.id')->select('debits.*', 'users.name')->get();
    }
}
