<?php

namespace App\Http\Controllers\Admin;

use App\Models\Common\Calculator\CalcStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalcStatusController extends Controller
{
    public function index()
    {
        $statuses = CalcStatus::all();
//        return $statuses;
//        return response()->json($statuses);

        return view('admin.calculator.calc_statuses.index', compact('statuses'));
    }
    public function getStatuses()
    {
        $statuses = CalcStatus::all();
        return response()->json($statuses);

    }

    public function store(Request $request)
    {
        CalcStatus::create($request->only('title_ru', 'title_uk'));

        return redirect()->route('statuses.index')
            ->with(['message' => 'Статус сохранен', 'class' => 'success']);
    }

    public function update(CalcStatus $status, Request $request)
    {
        if ($status->update($request->only('title_ru', 'title_uk'))){
            return response()->json( [
                "class" => "success", "message" => 'Статус сохранен'
            ] );
        } else {
            return response()->json( [
                "class" => "warning", "message" => 'Ну не знаю, почему-то не получилось обновить'
            ] );
        }
    }

    public function destroy(CalcStatus $status)
    {
        if ($status->delete()){
            return response()->json( [
                "class" => "success", "message" => 'Статус удален'
            ], 200 );
        } else {
            return response()->json( [
                "class" => "warning", "message" => 'Ну не знаю, почему-то не получилось удалить'
            ] );
        }
    }
}
