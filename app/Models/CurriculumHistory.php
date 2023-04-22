<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'curriculum_id',
        'user_id',
        'action',
        'description',
        'is_approved',
        'deleted'
    ];

    public function curriculum() {
        return $this->belongsTo(Curriculum::class, 'curriculum_id');
    }
}
