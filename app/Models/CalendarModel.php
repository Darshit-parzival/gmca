<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarModel extends Model
{
    use HasFactory;
    protected $table = "calendar_data";
    protected $primaryKey = "calendar_id";
}
