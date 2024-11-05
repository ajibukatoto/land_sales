<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Council extends Model
{
    // Specify the table name if it's not pluralized correctly by Laravel
    protected $table = 'councils'; // Optional if following conventions

    // Specify the fillable attributes for mass assignment
    protected $fillable = ['name']; // Add any other fields you need
}
