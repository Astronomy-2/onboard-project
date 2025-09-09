<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_marketing_details_table extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'current_marketing_activities',
        'successful_activities',
        'less_successful_activities',
        'monthly_marketing_budget',
        'ad_budget_allocation',
        'in_house_marketing_team',
        'previous_agency_experience',
        'website_traffic_sources',
        'email_marketing_list',
        'social_media_engagement',
        'cac_understanding',
        'marketing_automation_tools',
    ];

    public function client()
    {
        return $this->belongsTo(Client_onboarding::class, 'client_id');
    }
}