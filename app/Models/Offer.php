<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "name",
        "rational",
        "responsible",
        "location",
        "budget",
        "year",
        "target_quantity",
        "target_quality",
        "year_id",
        "strategic_t_id",
        "strategic_g_id",
        "strategic_s_id",
        "tactic_t_id",
        "tactic_g_id",
        "tactic_s_id",
        "user_id"
    ];
    public function year(){
        return $this->belongsTo(Year::class);
    }
    public function objective(){
        return $this->hasMany(Objective::class);
    }
    public function procedure(){
        return $this->hasMany(Procedure::class);
    }
    public function detail_budget(){
        return $this->hasMany(Detail_budget::class);
    }
    public function useful(){
        return $this->hasMany(Useful::class);
    }
    public function time(){
        return $this->hasMany(Time::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
