<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebPortalModel extends Model
{
    use HasFactory;

    protected $table = "webportal_data";
    protected $primaryKey = "id";
}
