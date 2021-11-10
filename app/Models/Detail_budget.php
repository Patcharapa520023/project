<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_budget extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id	',
        "offer_id",
        "detail",
        "amount",
    ];
    public function offer(){
        return $this->belongsTo(Offer::class);
    }
}
