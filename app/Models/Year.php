<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'planat',
        'start',
        'stop',
        'created_at',
        'updated_at',

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function department(){
        return $this->belongsTo(ํYear::class);
    }
}