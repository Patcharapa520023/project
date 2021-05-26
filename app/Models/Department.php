<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'dep_name',
        'address',
        'telnum',
        'fax',

    ];

}
