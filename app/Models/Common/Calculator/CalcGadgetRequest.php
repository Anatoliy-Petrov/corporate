<?php

namespace App\Models\Common\Calculator;

use Illuminate\Database\Eloquent\Model;

class CalcGadgetRequest extends Model
{
    use \App\Traits\Imageable;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'city',
        'office',
        'brand',
        'model',
        'cpu',
        'memory',
        'hdd',
        'video',
        'set',
        'condition',
        'price',
        'status',
    ];
}
