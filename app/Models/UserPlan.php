<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    use HasFactory;

    protected $fillable = ['plan_id','reference_transaction'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    //Pega o plano a partir do UserPlan
    public function plan(){
        $this->belongsTo(Plan::class);
    }
}
