<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertLectureModel extends Model
{
    use HasFactory;

    protected $table = 'expert_lecture_data';
    protected $primaryKey = 'el_id';
    public function admin()
    {
        return $this->belongsTo(AdminModel::class, 'staff_id', 'staff_id');
    }
}
