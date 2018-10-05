<?php

namespace App\Models\Common\Calculator;

use Illuminate\Database\Eloquent\Model;

class CalcPrice extends Model
{
    protected $fillable = ['value', 'calc_hallmark_id', 'calc_status_id', 'calc_tariff_id'];

    public function hallmark()
    {
        return $this->belongsTo(CalcHallmark::class, 'calc_hallmark_id', 'id');
    }

}
