<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tactics extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_tatics',
        'year',
        'strtegic_name',
        'tactics_name',
        

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
