<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'academic_year_id',
        'term_id',
        'is_approved',
        'deleted'
    ];

    public function histories() {
        return $this->hasMany(CurriculumHistory::class);
    }
}
