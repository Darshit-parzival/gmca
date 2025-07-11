<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialsModel extends Model
{
    use HasFactory;
    protected $table="testimonials_data";
    protected $primaryKey="t_id";
    protected $fillable = [
        'name',
        'message',
        'club',
        'status',
    ];
}
