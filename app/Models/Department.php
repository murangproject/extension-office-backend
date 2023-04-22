<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'deleted'
    ];

    public function head() {
        return $this->hasOne(User::class, 'head_id');
    }

    public function instructors() {
        return $this->hasMany(User::class);
    }
}
