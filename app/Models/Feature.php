<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Plan;

class Feature extends Model
{
    use HasFactory;

    protected $fillable=['name','slug','type'];

    //Feature pertence a um Plan
    // belongsTo do N pro 1
    public function plan(){
        return $this->belongsTo(Plan::class);
    }
}
