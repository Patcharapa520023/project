<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saveresult extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "cause",
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
}
