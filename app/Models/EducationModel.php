<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationModel extends Model
{
    use HasFactory;

    protected $table = 'education_data';

    protected $primaryKey="edu_id";

    public function staff()
    {
        return $this->belongsTo(StaffModel::class, 'staff_id', 'staff_id');
    }
}
