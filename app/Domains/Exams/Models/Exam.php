<?php

namespace Domains\Exams\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domains\Exams\Models\Package;
use App\Enums\Laterality;
use App\Enums\ExamGroup;

class Exam extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'comment',
        'laterality',
        'group',
    ];

    protected $casts = [
        'laterality' => Laterality::class,
        'group' => ExamGroup::class,
    ];

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'exam_package');
    }
}
