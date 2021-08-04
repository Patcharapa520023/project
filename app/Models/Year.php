<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'atplan',
        'start',
        'stop',

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function year(){
        return $this->belongsTo(Year::class);
    }
}
