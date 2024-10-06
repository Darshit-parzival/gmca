<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingModel extends Model
{
    use HasFactory;

    protected $table = 'training_data';
    protected $primaryKey = 'training_id';

    public function admin()
    {
        return $this->belongsTo(AdminModel::class, 'staff_id', 'staff_id');
    }
}
