<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;
    protected $fillable = [
        'target_user_id',
        'user_id', 'skill_id',
        'my_skill_id', 'shopNo', 'amount'
    ];
}
