<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sanction extends Model
{
    protected $fillable = [
        'student_id',
        'student_name',
        'event_name',
        'sanction_type',
        'reason',
        'sanction_date',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'sanction_date' => 'date',
        ];
    }
}
