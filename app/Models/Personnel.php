<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'name',
        'lastname',
        'address',
        'telnum',
        'position',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}

