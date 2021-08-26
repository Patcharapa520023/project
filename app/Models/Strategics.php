<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strategics extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_strategic',
        'year',
        'strtegic_name',
        

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
