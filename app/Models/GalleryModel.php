<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model
{
    use HasFactory;
    protected $table="gallery_data";
    protected $primaryKey="id";
    public function event()
    {
        return $this->belongsTo(EventModel::class, 'event_id');
    }
}
