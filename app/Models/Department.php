<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'address',
        'phone',
        'fax',
    ];
    public function personnel(){
        return $this->HasOne(Personnel::class);
    }

}
