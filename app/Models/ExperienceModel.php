<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceModel extends Model
{
    use HasFactory;
    protected $table="experience_data";
    protected $primaryKey="exp_id";
    public function admin()
    {
        return $this->belongsTo(AdminModel::class, 'staff_id', 'staff_id');
    }
}
