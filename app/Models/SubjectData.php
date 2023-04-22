<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectData extends Model
{
    use HasFactory;

    protected $fillable = [
        'lab_units',
        'lec_units',
    ];

    public function sections() {
        return $this->belongsToMany(Section::class);
    }

    public function instructor() {
        return $this->hasOne(User::class, 'instructor_id');
    }

    public function prerequisites() {
        return $this->hasMany(Subject::class);
    }

    public function corequisites() {
        return $this->hasMany(Subject::class);
    }
}
