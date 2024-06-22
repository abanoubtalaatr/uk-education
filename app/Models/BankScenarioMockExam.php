<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankScenarioMockExam extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mockExam()
    {
        return $this->belongsTo(MockExam::class);
    }

    public function bankScenario()
    {
        return $this->belongsTo(BankScenario::class);
    }
}
