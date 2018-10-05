<?php

namespace App\Models\Common\Calculator;

use Illuminate\Database\Eloquent\Model;

class CalcHallmark extends Model
{
    protected $fillable = ['hallmark', 'calc_tariff_id', 'calc_category_id'];
//    protected $with = ['prices'];

    public function tariff()
    {
        return $this->belongsTo(CalcTariff::class, 'calc_tariff_id', 'id');
    }

    public function prices()
    {
        return $this->hasMany(CalcPrice::class);
    }
}
