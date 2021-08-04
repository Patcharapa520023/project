<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strategic extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'name',
        'year',


    ];
    public function year(){
        return $this->belongsTo(Year::class);
    }
    public function strategic(){
        return $this->belongsTo(Strategic::class);
    }
}
