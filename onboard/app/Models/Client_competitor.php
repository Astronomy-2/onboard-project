<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client_competitor extends Model
{
   protected $fillable = [
        'client_id',
        'name',
        'website',
        'strengths_weaknesses',
        'marketing_likes',
        'differentiation',
        'target_audience',
        'pricing_strategy',
        'customer_service',
        'market_share',
    ];
public function client() {
        return $this->belongsTo(Client_onboarding::class, 'client_id');
    }

}