<?php

namespace App\Models\Common\Calculator;

use Illuminate\Database\Eloquent\Model;

class CalcTariff extends Model
{
    protected $fillable = ['title_ru', 'title_uk', 'calc_category_id', 'published'];

    public function category()
    {
        return $this->belongsTo(CalcCategory::class, 'calc_category_id', 'id');
    }

    public function hallmarks()
    {
        return $this->hasMany(CalcHallmark::class);
    }

    public function terms()
    {
        return $this->hasMany(CalcTerm::class);
    }

    public function maxAmounts()
    {
        return $this->hasMany(CalcMaxAmount::class);
    }

    public function rates()
    {
        return $this->hasMany(CalcRate::class);
    }

    public function prices()
    {
        return $this->hasMany(CalcPrice::class);
    }
}
