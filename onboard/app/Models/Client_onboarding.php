<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_onboarding extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'contact_person_name',
        'contact_person_designation',
        'contact_email',
        'contact_phone',
        'alternative_phone',
        'company_website',
        'company_address',
        'facebook_page',
        'whatsapp_number',
        'submission_date',
        'terms_agreement',
    ];

    // Relations

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function businessDetails()
    {
        return $this->hasOne(Client_business_detail::class, 'client_id');
    }

    public function marketingDetails()
    {
        return $this->hasOne(Client_marketing_details_table::class, 'client_id');
    }

    public function branding()
{
    return $this->hasOne(Client_branding::class, 'client_id');
}

    public function projectBudget()
    {
        return $this->hasOne(Client_project_budget::class, 'client_id');
    }

    public function audiences()
{
    return $this->hasOne(Client_audiences::class, 'client_id');
}

public function competitors()
{
    return $this->hasMany(Client_competitor::class, 'client_id');
}
public function goals()
{
    return $this->hasMany(Client_goal::class, 'client_id');
}




}
