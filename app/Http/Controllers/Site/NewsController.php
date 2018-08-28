<?php

namespace App\Http\Controllers\Site;

use App\Filters\NewsFilters;
use App\Models\Admin\News;
use App\Models\Admin\Region;
use App\Models\Common\City;
use App\Models\Common\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class NewsController extends Controller
{
    public function index(NewsFilters $filters, Request $request)
    {
        $cities=[];
        $meta_tags = Seo::whereAlias('news')->first();

        if ($request->has('region')) {
            $cities = City::where('region_id', $request->region)->with('region')->get();
        }
        $current_national = $request->has('national') ? 1 : null;

        $regions = Region::published()->get();
        $request = $request->only('region', 'city', 'national');

        $news    = $this->getNews($filters);

        return view('site.news.index',
            compact('news', 'request', 'regions', 'cities', 'current_national', 'month', 'meta_tags'));
    }

    public function show($news)
    {
        $news = News::whereAlias($news)->firstOrFail();

        return view('site.news.item', compact('news'));

    }

    protected function getNews(NewsFilters $filters)
    {
        if ($filters->getFilters()) {
            $news = News::filter($filters)->orderBy('created_at', 'DESC');
        } else {
            $news = News::published()->orderBy('created_at', 'DESC');
        }
        return $news->paginate(10);
    }
}
