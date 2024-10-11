<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    use HasFactory;
    protected $table="event_data";
    protected $primaryKey="id";
    protected $fillable = [
        'name',
        'type',
        'date',
        'report',
        'details',
        'status',
    ];
    public function galleries()
    {
        return $this->hasMany(GalleryModel::class, 'event_id');
    }
}
