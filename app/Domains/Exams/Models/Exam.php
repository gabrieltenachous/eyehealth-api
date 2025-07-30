<?php

namespace Domains\Exams\Models;

use App\Enums\ExamGroup;
use App\Enums\Laterality;
use Database\Factories\ExamFactory;
use Domains\Packages\Models\Package;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    protected static function newFactory()
    {
        return ExamFactory::new();
    }
}
