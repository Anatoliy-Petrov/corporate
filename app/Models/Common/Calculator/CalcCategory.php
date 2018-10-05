<?php

namespace App\Models\Common\Calculator;

use Illuminate\Database\Eloquent\Model;

class CalcCategory extends Model
{
    protected $fillable = ['title_ru', 'title_uk'];

    public function tariffs()
    {
        return $this->hasMany(CalcTariff::class);
    }

    public function hallmarks()
    {
        return $this->hasMany(CalcHallmark::class);
    }
}
