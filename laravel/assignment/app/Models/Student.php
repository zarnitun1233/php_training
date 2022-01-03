<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'age', 'major_id'
    ];

    /**
     * Major Fuction for table relationship
     */
    public function major()
    {
        return $this->belongsTo('App\Models\Major', 'major_id');
    }
}
