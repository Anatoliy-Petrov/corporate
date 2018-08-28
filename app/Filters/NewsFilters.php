<?php

namespace App\Filters;

//use App\User;


use App\Models\Admin\Region;
use App\Models\Common\City;

class NewsFilters extends Filters
{
    protected $filters = ['city', 'region', 'national'];

    /**
     * @param $builder
     */
    protected function city($id)
    {
        $city = City::where('id', $id)->firstOrFail();

        return $this->builder->where('city_id', $city->id);
    }

    protected function region($id)
    {
        $region = Region::where('id', $id)->firstOrFail();

        return $this->builder->where('region_id', $region->id);
    }

    protected function national()
    {
        return $this->builder->where('region_id', null);
    }
}