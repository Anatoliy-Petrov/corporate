<?php

namespace App\Http\Controllers\Admin;

use App\Models\Common\Calculator\CalcCategory;
use App\Models\Common\Calculator\CalcHallmark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalcHallmarkController extends Controller
{
    public function create(Request $request)
    {
        CalcHallmark::create([
            'hallmark' => (int)$request->hallmark
        ]);
    }

//    public function getHallmarks(CalcCategory $category)
//    {
//        $hallmarks = $category->hallmarks;
//        return $hallmarks;
//    }

    public function getHallmarks(Request $request)
    {
        if (is_array($request->get('id'))) {
            return CalcHallmark::whereIn('calc_category_id', $request->get('id'))->get();
        } else {
            return CalcHallmark::where('calc_category_id', $request->get('id'))->get();
        }
    }

    public function destroy(CalcHallmark $calcHallmark)
    {
        $calcHallmark->delete();

        if (request()->expectsJson()){
            return response([
                "class" => "success", "message" => 'Проба удалена.'
            ]);
        } else {
            return response([
                "class" => "error", "message" => 'При удалении пробы произошла ошибка'
            ]);
        }

    }
}
