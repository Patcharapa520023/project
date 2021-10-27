<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Useful extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'offer_id',
        'name',
    ];
}
