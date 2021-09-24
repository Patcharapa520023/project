<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'year_id',
        'name',
    ];
    public function year(){
        return $this->belongsTo(Year::class);
    }
    public function strategic(){
        return $this->hasMany(Strategic::class);
    }
}
