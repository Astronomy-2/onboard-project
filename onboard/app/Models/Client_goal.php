<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client_goal extends Model
{
    protected $fillable = [
    'client_id',
    'goal',
];

 public function client() {
        return $this->belongsTo(Client_onboarding::class, 'client_id');
    }
}