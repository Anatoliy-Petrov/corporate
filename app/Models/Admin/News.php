<?php

namespace App\Models\Admin;

use App\Models\Common\City;
use App\Models\Common\Image;
use App\Filters\NewsFilters;
use Illuminate\Database\Eloquent\Model;
use App\Search\Searchable;

class News extends Model
{
    use \App\Traits\Scopes;
    use \App\Traits\HandleImage;
    use \App\Traits\Imageable;
    use Searchable;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($news)
        {
            $news->images->each->delete();

            $news->deleteWithThumbnail($news->image, 'news');
        });
    }
    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function getConditions($search)
    {
        return $this->where('title_ru', 'like', "%{$search}%")
            ->orWhere('description_ru', 'like', "%{$search}%")
            ->orWhere('title_uk', 'like', "%{$search}%")
            ->orWhere('description_uk', 'like', "%{$search}%");
    }
}
