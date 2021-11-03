<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strategic extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'year_id',
        'name',
        'category',
    ];
    public function year(){
        return $this->belongsTo(Year::class);
    }
    public function tactic(){
        return $this->hasMany(Tactics::class);
    }

}
