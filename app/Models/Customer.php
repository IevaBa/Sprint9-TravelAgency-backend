<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $fillable = ['name', 'surname', 'email', 'phone', 'hotel_id'];

    public function hotel() {
        return $this->belongsTo('App\Models\Hotel');
    }
}