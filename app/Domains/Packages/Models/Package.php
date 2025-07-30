<?php

namespace Domains\Exams\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domains\Exams\Models\Exam;

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
