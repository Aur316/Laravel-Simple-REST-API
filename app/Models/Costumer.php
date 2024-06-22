<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Costumer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['full_name', 'email', 'phone', 'gps_coordinates'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}