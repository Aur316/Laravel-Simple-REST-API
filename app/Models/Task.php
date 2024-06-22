<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'costumer_id', 'description', 'type', 'status', 'gps_coordinates'
    ];

    public function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }

    public function workers()
    {
        return $this->belongsToMany(Worker::class);
    }
}
