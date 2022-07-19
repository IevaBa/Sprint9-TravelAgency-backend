<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    public $fillable = ['title', 'price', 'image', 'days', 'country_id'];

    public function country() {
        return $this->belongsTo('App\Models\Country');
    }

    public function customers(){
        return $this->hasMany('App\Models\Customer');
    }
}