<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_project_budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'project_budget',
        'budget_priorities',
        'results_timeline',
        'reporting_preference',
        'future_products_services',
        'tech_usage_plans',
        'e_commerce_payment_experience',
        'additional_info',
        'how_found_agency',
        'questions_for_agency',
    ];

    public function client()
    {
        return $this->belongsTo(Client_branding::class, 'client_id');
    }
}