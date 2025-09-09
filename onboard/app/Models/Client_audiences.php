<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client_audiences extends Model
{
      use HasFactory;

   protected $fillable = [
    'client_id',
    'age_range',
    'gender',
    'location',
    'profession_income',
    'education',
    'interests',
    'problems',
    'social_media',
    'online_behavior',
    'purchase_influencers',
    'devices',
    'content_formats',
];
     public function client() {
        return $this->belongsTo(Client_onboarding::class, 'client_id');
    }
}