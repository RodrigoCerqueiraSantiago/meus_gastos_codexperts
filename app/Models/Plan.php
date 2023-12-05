<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable=['name','description','slug','reference','price'];

    public function features(){
        return $this->hasMany(Feature::class);
    }

    public function getNameAttribute(){
        return $this->attributes['name'];
    }
    public function setNameAttribute($prop){
        return $this->attributes['name'] = $prop;
    }
    public function getDescription(){
        return $this->attributes['description'];
    }
    public function setDescriptionAttribute($prop){
        return $this->attributes['description'] = $prop;
    }
    public function getReferenceAttribute(){
        return $this->attributes['reference'];
    }
    public function setReferenceAttribute($prop){
        return $this->attributes['reference'] = $prop;
    }
}
