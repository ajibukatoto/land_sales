<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plot extends Model
{
    use HasFactory;

    protected $fillable = [
        'plot_number',
        'block',
        'locality',
        'plan_number',
        'registered_town_plan_number',
        'legal_area',
        'district',
        'region',
        'drawing_number',
        'survey_type',
        'surveyor_name',
        'council',
        'price',
    ];
}
