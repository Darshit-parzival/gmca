<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory;
    protected $table="staff_data";
    protected $primaryKey="staff_id";
    public function experiences()
    {
        return $this->hasMany(ExperienceModel::class, 'staff_id', 'staff_id');
    }

    public function educations()
    {
        return $this->hasMany(EducationModel::class, 'staff_id', 'staff_id');
    }

    public function trainings()
    {
        return $this->hasMany(TrainingModel::class, 'staff_id', 'staff_id');
    }

    public function expertLectures()
    {
        return $this->hasMany(ExpertLectureModel::class, 'staff_id', 'staff_id');
    }

}
