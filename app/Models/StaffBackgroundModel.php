<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffBackgroundModel extends Model
{
    use HasFactory;

    protected $table = 'staff_background'; 
    protected $primaryKey = 'bg_id';
   

    public function staff()
    {
        return $this->belongsTo(AdminModel::class, 'staff_id', 'staff_id');
    }
}
