<?php

namespace App\Models\Admin;

use App\Models\Common\Office;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $guarded = [];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
