<?php

namespace App\Models\Common\Calculator;

use Illuminate\Database\Eloquent\Model;

class CalcMaxAmount extends Model
{
    protected $fillable = ['value', 'calc_tariff_id'];

    public function tariff()
    {
        return $this->belongsTo(CalcTariff::class, 'calc_tariff_id', 'id');
    }
}
