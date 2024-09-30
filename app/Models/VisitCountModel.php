<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitCountModel extends Model
{
    use HasFactory;

    protected $table = "visit_count_data";
    protected $primaryKey = "visit_id";
    protected $fillable = ['ip'];
}
