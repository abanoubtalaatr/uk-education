<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    use HasFactory;

    protected $fillable = ['bank_scenario_id','question', 'answer', 'notes'];

    public function bankScenario()
    {
        return $this->belongsTo(BankScenario::class);
    }
}
