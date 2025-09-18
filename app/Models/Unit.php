<?php

// app/Models/Unit.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units'; // only if not default "units"
    protected $fillable = ['id', 'image_id', 'unit_name', 'base_character_name', 'unit_type', 'num_of_characters', 'era', 'affiliation', 'force_available', 'stamina', 'unit_durability', 'points_value', 'default_squad', 'isOwned'];
}

