<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CauHinhThi extends Model
{
    use HasFactory;

    protected $table = 'cau_hinh_this';

    protected $primaryKey = 'cauHinhId';

    protected $fillable = [
        'deThiId',
        'hasMonitoring',
        'allowCopy',
        'allowPrint',
        'isEnableResume',
        'shuffleQuestions',
        'shuffleAnswers',
        'showScore',
        'showDetailResults',
        'isLimitSwitchTab',
        'tabSwitchLimit',
        'messageOnWarning',
    ];

    protected $casts = [
        'hasMonitoring' => 'boolean',
        'allowCopy' => 'boolean',
        'allowPrint' => 'boolean',
        'isEnableResume' => 'boolean',
        'shuffleQuestions' => 'boolean',
        'shuffleAnswers' => 'boolean',
        'showScore' => 'boolean',
        'showDetailResults' => 'boolean',
        'isLimitSwitchTab' => 'boolean',
        'tabSwitchLimit' => 'integer',
    ];

    public function deThi(): BelongsTo
    {
        return $this->belongsTo(DeThi::class, 'deThiId', 'id');
    }
}
