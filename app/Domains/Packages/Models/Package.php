<?php

namespace Domains\Packages\Models;

use Domains\Exams\Models\Exam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Package extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['name'];

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_package');
    }
}
