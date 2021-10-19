<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tactics extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'year_id',
        'strategic_id',
        'name',
    ];
    public function year(){
        return $this->hasOne(Year::class);
    }
    public function strategic(){
        return $this->hasOne(Strategic::class);
    }
}
