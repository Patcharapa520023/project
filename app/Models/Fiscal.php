<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiscal extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'planat',
        'start',
        'stop',
        'time',

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function department(){
        return $this->belongsTo(ํFiscal::class);
    }
}