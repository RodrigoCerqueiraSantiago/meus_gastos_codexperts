<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    protected $table = 'user_plan';

    use HasFactory;

    protected $fillable = [
        'plan_id',
        'reference_transaction',
        'status',
        'date_subscription'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    //Pega o plano a partir do UserPlan
    public function plan(){
        $this->belongsTo(Plan::class);
    }
}
