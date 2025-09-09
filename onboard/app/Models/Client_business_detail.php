<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_business_detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'business_type',
        'business_start_date',
        'business_details',
        'business_vision',
        'business_mission',
        'main_products_services',
        'financial_status',
        'popular_products',
        'daily_time_commitment',
        'core_values',
        'main_challenges',
        'agency_expectations',
        'marketing_kpis',
        'past_failures',
    ];

    public function client()
    {
        return $this->belongsTo(Client_onboarding::class, 'client_id');
    }
}