<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommonRequest;
use App\Models\Admin\News;
use App\Models\Admin\Region;
use App\Models\Common\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $paginate = 10;
        $page = $request->has('page') ? $request->page*$paginate-$paginate : 0;
        $news = News::with('region', 'city')->orderBy('updated_at', 'desc')->paginate($paginate);

        return view('admin.news.index', compact('news', 'page'));
    }

    public function create()
    {
        $regions = Region::published()->get();

        return view('admin.news.create', compact('regions'));
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $regions = Region::published()->get();

        return view('admin.news.create', compact('news', 'regions'));
    }

    public function store(CommonRequest $request)
    {
        $news = new News;

        $this->saveNews($request, $news);

        return redirect()->route('news.index')
            ->with(['message' => 'Новость сохранена', 'class' => 'success']);
    }

    public function update(CommonRequest $request, $id)
    {
        $news = News::findOrFail($id);

        $this->saveNews($request, $news);

        return redirect()->route('news.index')
            ->with(['message' => 'Новость сохранена', 'class' => 'success']);
    }

    private function saveNews($request, $news)
    {
        $input = $request->except('_token', '_method', 'images');
        $input['alias'] = $request->alias ? $request->alias : str_slug($request->title_ru);
        if ($request->has('image')) {

            $news->deleteImage($news->image, 'news');

            $input['image'] = $news->saveWithThumbnail($request->image, 'news', 650, 500, 418, 243);
        } else {
            $input['image'] = $news->image;
        }

        $news->fill($input);
        $news->save();

        if ($request->has('images')){
            foreach ($request->images as $image){
                // создали картинку, запись на диск, возвращает filename.jpeg
                $imageName = $news->saveWithThumbnail($image, 'news', 1300, 1000, 276, 212);
                // создали запись в таблице images
                $news->addImage($imageName);
            }
        }
    }

    public function destroyAll(Request $request)
    {
        if($request->news && count($request->news)){

            News::destroy($request->news);

            return redirect()->route('news.index')
                ->with(['message' => 'Новости удалены', 'class' => 'success']);
        } else {
            return back()->with(['message' => 'Не выбрано ни одной новости', 'class' => 'warning']);
        }
    }
    public function destroy( News $news ) {

        if ($news->delete()){
            return response()->json( [
                "class" => "success", "message" => 'Новость удалена'
            ] );
        }
    }
}
