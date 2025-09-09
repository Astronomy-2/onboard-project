<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_branding extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'brand_personality',
        'existing_marketing_materials',
        'brand_tone_of_voice',
        'content_themes_pillars',
        'preferred_visuals',
    ];

    public function client()
    {
        return $this->belongsTo(related: Client_branding::class, foreignKey: 'client_id');
    }
}