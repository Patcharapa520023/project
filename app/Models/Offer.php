<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'rational',
        'responsible',
        'location',
        'budget',
    ];
    public function year(){
        return $this->belongsTo(Year::class);
    }
}
