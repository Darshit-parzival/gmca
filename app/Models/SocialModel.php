<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialModel extends Model
{
    use HasFactory;
    protected $table = "social_link_data";
    protected $primaryKey = "social_id";
}
